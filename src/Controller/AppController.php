<?php
namespace App\Controller;

use App\Form\CoverType;
use OpenAI;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class AppController extends AbstractController
{
    #[Route('/app', name: 'app_app')]
    public function index(Request $request): Response
    {
        $form = $this ->createForm(CoverType::class);
        
        $form-> handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()){
            $message='';
            $data=$form->getData();

            $client = OpenAI::client('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');

            $response = $client->chat()->create([
                'model' => 'gpt-3.5-turbo',
                'messages' => [
                    ['role' => 'user', 'content' => 'Mon nom est' . $data['nom'].' '.$data['prenom'].'.',],
                    ['role' => 'user', 'content' => 'Diplome' . $data['diplome'].'.',],
                    ['role' => 'user', 'content' => 'Entreprise Cible : ' . $data['entreprise'].'.',],
                    ['role' => 'user', 'content' => 'Poste cible : ' . $data['poste'].'.',],
                    ['role' => 'user', 'content' => 'Annonce' . $data['annonce'].'.',],
                    ['role' => 'user', 'content' => 'Ecrit une lettre de motivation convaincante en markdown, profesionnelle et personnalisée.',]
                ],
            ]);
            
            global $message; 
            $message = $response->choices[0]->message->content;
            dd($message);
            $message = $response->choices[0]->message->content;
        }
            $contents=$this->renderView('app/index.html.twig', [
            'controller_name' => 'AppController',
            'form' => $form->createView(),
            'message' => $message ?? null
        ]);
        return new Response($contents);
    }
}
