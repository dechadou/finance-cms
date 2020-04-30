<?php

namespace App\Controller\Api;


use App\Entity\LoginLog;
use App\Entity\User;
use App\Form\Type\NewPasswordType;
use App\Form\Type\PasswordRequestType;
use App\Form\Type\UserLoginType;
use App\Security\JWT\JWTService;
use App\Utils\MailHelper;

use Exception;

use MediaMonks\Doctrine\Transformable\Transformer\PhpHashTransformer;

use MediaMonks\RestApi\Exception\FormValidationException;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

use Symfony\Component\HttpKernel\Exception\ConflictHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

use Symfony\Component\HttpKernel\Exception\UnprocessableEntityHttpException;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

/**
 * @Route("/login")
 */
class LoginController extends AbstractController
{

    /**
     * @var UserPasswordEncoderInterface
     */
    private $passwordEncoder;

    /**
     * @var JWTService
     */
    private $JWTService;

    /**
     * @var MailHelper
     */
    private $mailHelper;
    /**
     * @var PhpHashTransformer
     */
    private $transformer;


    /**
     * LoginController constructor.
     * @param UserPasswordEncoderInterface $passwordEncoder
     * @param JWTService $JWTService
     * @param MailHelper $mailHelper
     * @param PhpHashTransformer $transformer
     */
    public function __construct(UserPasswordEncoderInterface $passwordEncoder, JWTService $JWTService, MailHelper $mailHelper, PhpHashTransformer $transformer)
    {
        $this->passwordEncoder = $passwordEncoder;
        $this->JWTService = $JWTService;
        $this->mailHelper = $mailHelper;
        $this->transformer = $transformer;
    }

    /**
     * @Route("/", name="api_login_form")
     * @Route/Method({"POST"})
     * @param Request $request
     * @return array|bool|Response
     * @throws FormValidationException
     */
    public function loginAction(Request $request)
    {
        $form = $this->createForm(UserLoginType::class);

        $form->submit($request->request->all());

        if (!$form->isValid()) {
            throw new FormValidationException($form);
        }


        $mailCanonical = $request->request->get('email');
        $user = $this->getDoctrine()->getRepository(User::class)->findOneBy([
            'email' => $mailCanonical
        ]);

        if (!$user) {
            throw new NotFoundHttpException('User not found');
        }

        if (!$this->passwordEncoder->isPasswordValid($user, $request->request->get('password'))) {
            throw new AccessDeniedHttpException();
        }

        $jwt = $this->JWTService->encode($user->getId());


        $this->saveLog($user);


        return [
            'access_token' => $jwt
        ];
    }

    public function saveLog(User $user)
    {
        if ($user) {
            $log = new LoginLog();
            $log->setUser($user);
            $this->getDoctrine()->getManager()->persist($log);
            $this->getDoctrine()->getManager()->flush();
        }
    }


    /**
     * @Route("/reset", name="api_reset_form")
     * @Route/Method({"POST"})
     * @param Request $request
     * @return array|bool|Response
     * @throws FormValidationException
     */
    public function resetAction(Request $request)
    {
        $form = $this->createForm(PasswordRequestType::class);

        $form->submit($request->request->all());

        if (!$form->isValid()) {
            throw new FormValidationException($form);
        }

        $email = $form->get('email')->getData();
        $token = bin2hex(random_bytes(32));


        $mailCanonical = $email;
        $user = $this->getDoctrine()->getRepository(User::class)->findOneBy([
            'email' => $mailCanonical
        ]);

        if (!$user) {
            throw new AccessDeniedHttpException();
        }

        if ($user instanceof User) {
            $user->setPasswordRequestToken($token);

            try {
                $this->getDoctrine()->getManager()->flush();
            } catch (Exception $e) {
                throw new UnprocessableEntityHttpException($e->getMessage());
            }

            //$this->mailHelper->sendEmail($token, $email, $request);

            return true;
        }
    }

    /**
     * @Route("/reset/{token}", name="api_reset_token_form")
     * @Route/Method({"POST"})
     * @param Request $request
     * @param $token
     * @return array|bool|Response
     * @throws FormValidationException
     */
    public function resetTokenAction(Request $request, $token)
    {
        $form = $this->createForm(NewPasswordType::class);

        $form->submit($request->request->all());

        if (!$form->isValid()) {
            throw new FormValidationException($form);
        }

        $user = $this->getDoctrine()->getManager()->getRepository(User::class)->findOneBy(['passwordRequestToken' => $token]);

        if (!$user) {
            throw new AccessDeniedHttpException('invalid token');
        }

        $user->setPassword(
            $this->passwordEncoder->encodePassword(
                $user,
                $request->get('password')
            )
        );

        try {
            $this->getDoctrine()->getManager()->flush();
        } catch (Exception $e) {
            throw new UnprocessableEntityHttpException($e->getMessage());
        }

        $jwt = $this->JWTService->encode($user->getId());

        return [
            'access_token' => $jwt
        ];
    }


}
