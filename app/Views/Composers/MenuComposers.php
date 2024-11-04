<?php 
namespace App\Views\Composers;

class MenuComposer
{
    public function compose($view)
    {
        $menu = [
            'Home' => '/',
            'About' => '/about',
            'Contact' => '/contact',
        ];

        $authenticated = true; // untuk development

        // Logic untuk menambah menu jika user $authenticated bernilai true
        if ($authenticated){
            $menu = array_merge($menu, [
                'Logout' => '/logout',
                'Profile' => '/profile',
                'Dashboard' => '/dashboard',
            ]);
        }

        $view->with('menu',$menu);
    }
}
?>