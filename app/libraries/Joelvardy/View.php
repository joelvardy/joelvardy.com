<?php

/**
 * View library
 *
 * This library simply wraps around the view handler baked into the Slim framework allowing views to be returned, and allowing views within a template.
 */

namespace Joelvardy;

class View
{

    /**
     * Return HTML rather than echoing it
     */
    public static function render($filename, $data = [])
    {

        $app = \Slim\Slim::getInstance();

        ob_start();
        $app->render($filename, $data);
        return ob_get_clean();

    }

    /**
     * Render a view within a template
     *
     * Add <?php echo $pageView; ?> in the template file where the view will be rendered
     */
    public static function template($template, $data, $view)
    {
        $data['pageView'] = self::render($view, $data);
        return self::render('templates/' . $template, $data);
    }

}
