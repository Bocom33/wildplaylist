<?php
/**
 * Created by PhpStorm.
 * Playlist: aurelwcs
 * Date: 08/04/19
 * Time: 18:40
 */

namespace App\Controller;

use App\Model\HomeManager;

class HomeController extends AbstractController
{
    /**
     * Display home page
     *
     * @return string
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    const PLAYLIST_NB_HOMEPAGE = 10 ;
    const MAINWORD_HOMEPAGE_SELECTED_PLAYLISTS= 'tous les temps';

    public function index() : string
    {
        $message=[];
        if (isset($_GET['connected'])) {
            $message['notConnected']='Merci de vous inscrire ou de vous connecter pour voir le détail des playlists !';
        }
        $homeManager = new HomeManager();
        $playlists=$homeManager->selectPlaylistsWithQuestionAndLimit(
            self::MAINWORD_HOMEPAGE_SELECTED_PLAYLISTS,
            self::PLAYLIST_NB_HOMEPAGE
        );
        return $this->twig->render('Home/index.html.twig', [
            'playlists'=>$playlists,
            'notConnected'=>$message,
        ]);
    }
}
