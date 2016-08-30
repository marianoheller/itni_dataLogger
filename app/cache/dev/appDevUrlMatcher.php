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

        if (0 === strpos($pathinfo, '/assetic')) {
            // _assetic_bootstrap_css
            if ($pathinfo === '/assetic/bootstrap_css.css') {
                return array (  '_controller' => 'assetic.controller:render',  'name' => 'bootstrap_css',  'pos' => NULL,  '_format' => 'css',  '_route' => '_assetic_bootstrap_css',);
            }

            // _assetic_fontawesome_css
            if ($pathinfo === '/assetic/fontawesome_css.css') {
                return array (  '_controller' => 'assetic.controller:render',  'name' => 'fontawesome_css',  'pos' => NULL,  '_format' => 'css',  '_route' => '_assetic_fontawesome_css',);
            }

        }

        // _assetic_fontawesome_woff2
        if ($pathinfo === '/fonts/fontawesome-webfont.woff2') {
            return array (  '_controller' => 'assetic.controller:render',  'name' => 'fontawesome_woff2',  'pos' => NULL,  '_format' => 'woff2',  '_route' => '_assetic_fontawesome_woff2',);
        }

        if (0 === strpos($pathinfo, '/assetic')) {
            // _assetic_jquery_js
            if ($pathinfo === '/assetic/jquery_js.js') {
                return array (  '_controller' => 'assetic.controller:render',  'name' => 'jquery_js',  'pos' => NULL,  '_format' => 'js',  '_route' => '_assetic_jquery_js',);
            }

            // _assetic_tether_js
            if ($pathinfo === '/assetic/tether_js.js') {
                return array (  '_controller' => 'assetic.controller:render',  'name' => 'tether_js',  'pos' => NULL,  '_format' => 'js',  '_route' => '_assetic_tether_js',);
            }

            // _assetic_bootstrap_js
            if ($pathinfo === '/assetic/bootstrap_js.js') {
                return array (  '_controller' => 'assetic.controller:render',  'name' => 'bootstrap_js',  'pos' => NULL,  '_format' => 'js',  '_route' => '_assetic_bootstrap_js',);
            }

            // _assetic_moment_js
            if ($pathinfo === '/assetic/moment_js.js') {
                return array (  '_controller' => 'assetic.controller:render',  'name' => 'moment_js',  'pos' => NULL,  '_format' => 'js',  '_route' => '_assetic_moment_js',);
            }

        }

        if (0 === strpos($pathinfo, '/fonts')) {
            if (0 === strpos($pathinfo, '/fonts/fontawesome-webfont.')) {
                // _assetic_fontawesome_woff
                if ($pathinfo === '/fonts/fontawesome-webfont.woff') {
                    return array (  '_controller' => 'assetic.controller:render',  'name' => 'fontawesome_woff',  'pos' => NULL,  '_format' => 'woff',  '_route' => '_assetic_fontawesome_woff',);
                }

                // _assetic_fontawesome_ttf
                if ($pathinfo === '/fonts/fontawesome-webfont.ttf') {
                    return array (  '_controller' => 'assetic.controller:render',  'name' => 'fontawesome_ttf',  'pos' => NULL,  '_format' => 'ttf',  '_route' => '_assetic_fontawesome_ttf',);
                }

            }

            // _assetic_fontawesome_otf
            if ($pathinfo === '/fonts/FontAwesome.otf') {
                return array (  '_controller' => 'assetic.controller:render',  'name' => 'fontawesome_otf',  'pos' => NULL,  '_format' => 'otf',  '_route' => '_assetic_fontawesome_otf',);
            }

        }

        if (0 === strpos($pathinfo, '/css')) {
            if (0 === strpos($pathinfo, '/css/1')) {
                // _assetic_1886b1b
                if ($pathinfo === '/css/1886b1b.css') {
                    return array (  '_controller' => 'assetic.controller:render',  'name' => '1886b1b',  'pos' => NULL,  '_format' => 'css',  '_route' => '_assetic_1886b1b',);
                }

                // _assetic_12e7e09
                if ($pathinfo === '/css/12e7e09.css') {
                    return array (  '_controller' => 'assetic.controller:render',  'name' => '12e7e09',  'pos' => NULL,  '_format' => 'css',  '_route' => '_assetic_12e7e09',);
                }

            }

            // _assetic_93b3f23
            if ($pathinfo === '/css/93b3f23.css') {
                return array (  '_controller' => 'assetic.controller:render',  'name' => '93b3f23',  'pos' => NULL,  '_format' => 'css',  '_route' => '_assetic_93b3f23',);
            }

            // _assetic_74c9d00
            if ($pathinfo === '/css/74c9d00.css') {
                return array (  '_controller' => 'assetic.controller:render',  'name' => '74c9d00',  'pos' => NULL,  '_format' => 'css',  '_route' => '_assetic_74c9d00',);
            }

        }

        // _assetic_6de2781
        if ($pathinfo === '/js/6de2781.js') {
            return array (  '_controller' => 'assetic.controller:render',  'name' => '6de2781',  'pos' => NULL,  '_format' => 'js',  '_route' => '_assetic_6de2781',);
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

        // checkEnsayoStart
        if ($pathinfo === '/checkEnsayoStart') {
            return array (  '_controller' => 'AppBundle\\Controller\\DeviceController::checkEnsayoStartAction',  '_route' => 'checkEnsayoStart',);
        }

        // logData
        if ($pathinfo === '/logdata') {
            return array (  '_controller' => 'AppBundle\\Controller\\DeviceController::logDataAction',  '_route' => 'logData',);
        }

        // admin
        if ($pathinfo === '/admin') {
            return array (  '_controller' => 'AppBundle\\Controller\\PagesAdminController::adminAction',  '_route' => 'admin',);
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

        if (0 === strpos($pathinfo, '/ensayo')) {
            // ensayo
            if ($pathinfo === '/ensayo') {
                return array (  '_controller' => 'AppBundle\\Controller\\PagesController::ensayoAction',  '_route' => 'ensayo',);
            }

            // ensayoRun
            if (preg_match('#^/ensayo(?:/(?P<slug>[^/]++))?$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'ensayoRun')), array (  'slug' => 1,  '_controller' => 'AppBundle\\Controller\\PagesController::ensayoNowAction',));
            }

        }

        if (0 === strpos($pathinfo, '/historial')) {
            // historial
            if ($pathinfo === '/historial') {
                return array (  '_controller' => 'AppBundle\\Controller\\PagesController::historialAction',  '_route' => 'historial',);
            }

            // historialVer
            if ($pathinfo === '/historial/ver') {
                return array (  '_controller' => 'AppBundle\\Controller\\PagesController::historialVerAction',  '_route' => 'historialVer',);
            }

        }

        // avanzado
        if ($pathinfo === '/avanzado') {
            return array (  '_controller' => 'AppBundle\\Controller\\PagesController::exportarAction',  '_route' => 'avanzado',);
        }

        if (0 === strpos($pathinfo, '/ge')) {
            // generateCSV
            if ($pathinfo === '/generateCSV') {
                return array (  '_controller' => 'AppBundle\\Controller\\PagesController::generateCsvAction',  '_route' => 'generateCSV',);
            }

            if (0 === strpos($pathinfo, '/get')) {
                // getSensoresStatus
                if ($pathinfo === '/getSensoresStatus') {
                    return array (  '_controller' => 'AppBundle\\Controller\\SensoresController::getSensoresStatusAction',  '_route' => 'getSensoresStatus',);
                }

                // getGraphData
                if ($pathinfo === '/getGraphData') {
                    return array (  '_controller' => 'AppBundle\\Controller\\SensoresController::getGraphDataAction',  '_route' => 'getGraphData',);
                }

            }

        }

        // cancelEnsayo
        if ($pathinfo === '/ensayo/cancel/all') {
            return array (  '_controller' => 'AppBundle\\Controller\\SensoresController::cancelEnsayoAction',  '_route' => 'cancelEnsayo',);
        }

        // getHistGraphData
        if ($pathinfo === '/getHistGraphData') {
            return array (  '_controller' => 'AppBundle\\Controller\\SensoresController::getHistGraphDataAction',  '_route' => 'getHistGraphData',);
        }

        // logout
        if ($pathinfo === '/logout') {
            return array('_route' => 'logout');
        }

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
