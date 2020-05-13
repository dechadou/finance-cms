<?php

namespace App\Controller\Api;


use App\Entity\DocumentosFideicomiso;
use App\Entity\Startup;
use MediaMonks\RestApi\Exception\FormValidationException;
use MediaMonks\RestApi\Response\Response;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\ConflictHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Exception\UnprocessableEntityHttpException;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/documentos_fideicomiso")
 */
class DocumentosFideicomisoController extends AbstractController
{
    /**
     * @Route("/list", name="documentos_fideicomiso_list")
     * @Route/Method({"GET"})
     */
    public function listAction()
    {
        $result = [];
        $documentos = $this->getDoctrine()->getRepository(DocumentosFideicomiso::class)->findAll();
        foreach ($documentos as $documento) {

            $result[] = [
                'id' => $documento->getId(),
                'type' => $documento->getType()->getName(),
                'name' => $documento->getName(),
                'value' => $documento->getValue(),
                'source' => $documento->getSource(),
                'date' => $documento->getDate(),
                'created_at' => $documento->getCreatedAt(),
                'updated_at' => $documento->getUpdatedAt()
            ];
        }

        return $result;
    }

    /**
     * @Route("/{id}", name="documentos_fideicomiso_by_id")
     * @Route/Method({"GET"})
     */
    public function showAction($id)
    {
        $documento = $this->getDoctrine()->getRepository(DocumentosFideicomiso::class)->findOneById($id);
        if (!$documento) {
            return [];
        }
        return [
            'id' => $documento->getId(),
            'type' => $documento->getType()->getName(),
            'name' => $documento->getName(),
            'value' => $documento->getValue(),
            'source' => $documento->getSource(),
            'date' => $documento->getDate(),
            'created_at' => $documento->getCreatedAt(),
            'updated_at' => $documento->getUpdatedAt()
        ];
    }
}