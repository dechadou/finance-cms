<?php
namespace App\Utils;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\RouterInterface;

/**
 * Created by PhpStorm.
 * User: juanpablo
 * Date: 2019-04-23
 * Time: 20:10
 */

class MailHelper extends AbstractController
{

    /**
     * @var RouterInterface
     */
    private $router;

    /**
     * @var \Swift_Mailer
     */
    private $mailer;

    public function __construct(RouterInterface $router,  \Swift_Mailer $mailer)
    {
        $this->router = $router;
        $this->mailer = $mailer;
    }

    /**
     * @param $token
     * @param $email
     * @param Request $request
     * @return bool
     * @throws \Exception
     */
    public function sendEmail($token, $email, Request $request) {

        $site_url = $request->get('url') . $token;

        $from = $this->getParameter('mail_from');

        $subject = 'Recupera tu contraseña';

        $message = (new \Swift_Message($subject))
            ->setFrom($from)
            ->setTo($email)
            ->setBody(
                $this->renderView(
                    'emails/restore_password.html.twig',
                    [
                        'site_url' => $site_url
                    ]
                ),
                'text/html'
            )
        ;

        $this->mailer->send($message);

        return true;

    }

}