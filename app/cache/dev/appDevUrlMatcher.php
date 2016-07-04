<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * appDevUrlMatcher.
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appDevUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
{
    /**
     * Constructor.
     */
    public function __construct(RequestContext $context)
    {
        $this->context = $context;
    }

    public function match($pathinfo)
    {
        $allow = array();
        $pathinfo = rawurldecode($pathinfo);
        $context = $this->context;
        $request = $this->request;

        if (0 === strpos($pathinfo, '/css/3a828ab')) {
            // _assetic_3a828ab
            if ($pathinfo === '/css/3a828ab.css') {
                return array (  '_controller' => 'assetic.controller:render',  'name' => '3a828ab',  'pos' => NULL,  '_format' => 'css',  '_route' => '_assetic_3a828ab',);
            }

            // _assetic_3a828ab_0
            if ($pathinfo === '/css/3a828ab_part_1_style_1.css') {
                return array (  '_controller' => 'assetic.controller:render',  'name' => '3a828ab',  'pos' => 0,  '_format' => 'css',  '_route' => '_assetic_3a828ab_0',);
            }

        }

        if (0 === strpos($pathinfo, '/_')) {
            // _wdt
            if (0 === strpos($pathinfo, '/_wdt') && preg_match('#^/_wdt/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => '_wdt')), array (  '_controller' => 'web_profiler.controller.profiler:toolbarAction',));
            }

            if (0 === strpos($pathinfo, '/_profiler')) {
                // _profiler_home
                if (rtrim($pathinfo, '/') === '/_profiler') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', '_profiler_home');
                    }

                    return array (  '_controller' => 'web_profiler.controller.profiler:homeAction',  '_route' => '_profiler_home',);
                }

                if (0 === strpos($pathinfo, '/_profiler/search')) {
                    // _profiler_search
                    if ($pathinfo === '/_profiler/search') {
                        return array (  '_controller' => 'web_profiler.controller.profiler:searchAction',  '_route' => '_profiler_search',);
                    }

                    // _profiler_search_bar
                    if ($pathinfo === '/_profiler/search_bar') {
                        return array (  '_controller' => 'web_profiler.controller.profiler:searchBarAction',  '_route' => '_profiler_search_bar',);
                    }

                }

                // _profiler_purge
                if ($pathinfo === '/_profiler/purge') {
                    return array (  '_controller' => 'web_profiler.controller.profiler:purgeAction',  '_route' => '_profiler_purge',);
                }

                // _profiler_info
                if (0 === strpos($pathinfo, '/_profiler/info') && preg_match('#^/_profiler/info/(?P<about>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_info')), array (  '_controller' => 'web_profiler.controller.profiler:infoAction',));
                }

                // _profiler_phpinfo
                if ($pathinfo === '/_profiler/phpinfo') {
                    return array (  '_controller' => 'web_profiler.controller.profiler:phpinfoAction',  '_route' => '_profiler_phpinfo',);
                }

                // _profiler_search_results
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/search/results$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_search_results')), array (  '_controller' => 'web_profiler.controller.profiler:searchResultsAction',));
                }

                // _profiler
                if (preg_match('#^/_profiler/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler')), array (  '_controller' => 'web_profiler.controller.profiler:panelAction',));
                }

                // _profiler_router
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/router$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_router')), array (  '_controller' => 'web_profiler.controller.router:panelAction',));
                }

                // _profiler_exception
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/exception$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_exception')), array (  '_controller' => 'web_profiler.controller.exception:showAction',));
                }

                // _profiler_exception_css
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/exception\\.css$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_exception_css')), array (  '_controller' => 'web_profiler.controller.exception:cssAction',));
                }

            }

            // _twig_error_test
            if (0 === strpos($pathinfo, '/_error') && preg_match('#^/_error/(?P<code>\\d+)(?:\\.(?P<_format>[^/]++))?$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => '_twig_error_test')), array (  '_controller' => 'twig.controller.preview_error:previewErrorPageAction',  '_format' => 'html',));
            }

        }

        // login
        if ($pathinfo === '/login') {
            return array (  '_controller' => 'AppBundle\\Controller\\AccountController::loginAction',  '_route' => 'login',);
        }

        if (0 === strpos($pathinfo, '/re')) {
            // register
            if ($pathinfo === '/register') {
                return array (  '_controller' => 'AppBundle\\Controller\\AccountController::registerAction',  '_route' => 'register',);
            }

            // reset
            if ($pathinfo === '/reset') {
                return array (  '_controller' => 'AppBundle\\Controller\\AccountController::resetAction',  '_route' => 'reset',);
            }

        }

        // logout
        if ($pathinfo === '/logout') {
            return array (  '_controller' => 'AppBundle\\Controller\\AccountController::logoutAction',  '_route' => 'logout',);
        }

        if (0 === strpos($pathinfo, '/old_')) {
            // old_index
            if ($pathinfo === '/old_index') {
                return array (  '_controller' => 'AppBundle\\Controller\\DataLoggerController::indexAction',  '_route' => 'old_index',);
            }

            // main
            if ($pathinfo === '/old_homepage') {
                return array (  '_controller' => 'AppBundle\\Controller\\DataLoggerController::lastDataAction',  '_route' => 'main',);
            }

        }

        // promedio
        if ($pathinfo === '/promedio') {
            return array (  '_controller' => 'AppBundle\\Controller\\DataLoggerController::promedioAction',  '_route' => 'promedio',);
        }

        if (0 === strpos($pathinfo, '/hist')) {
            // historial
            if ($pathinfo === '/historial') {
                return array (  '_controller' => 'AppBundle\\Controller\\DataLoggerController::histDataAction',  '_route' => 'historial',);
            }

            // historial_update
            if ($pathinfo === '/hist_update') {
                return array (  '_controller' => 'AppBundle\\Controller\\DataLoggerController::histUpdateDataAction',  '_route' => 'historial_update',);
            }

        }

        // logData
        if ($pathinfo === '/logdata') {
            return array (  '_controller' => 'AppBundle\\Controller\\DataLoggerController::logDataAction',  '_route' => 'logData',);
        }

        // homepage
        if (rtrim($pathinfo, '/') === '') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'homepage');
            }

            return array (  '_controller' => 'AppBundle\\Controller\\PagesController::homepageAction',  '_route' => 'homepage',);
        }

        // sensores
        if ($pathinfo === '/sensores') {
            return array (  '_controller' => 'AppBundle\\Controller\\PagesController::sensoresAction',  '_route' => 'sensores',);
        }

        // ensayo
        if ($pathinfo === '/ensayo') {
            return array (  '_controller' => 'AppBundle\\Controller\\PagesController::ensayoAction',  '_route' => 'ensayo',);
        }

        // about
        if ($pathinfo === '/about') {
            return array (  '_controller' => 'AppBundle\\Controller\\PagesController::aboutAction',  '_route' => 'about',);
        }

        // ensayoNow
        if ($pathinfo === '/ensayo/now') {
            return array (  '_controller' => 'AppBundle\\Controller\\PagesController::ensayoNowAction',  '_route' => 'ensayoNow',);
        }

        // getSensoresStatus
        if ($pathinfo === '/getSensoresStatus') {
            return array (  '_controller' => 'AppBundle\\Controller\\SensoresController::getSensoresStatusAction',  '_route' => 'getSensoresStatus',);
        }

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
