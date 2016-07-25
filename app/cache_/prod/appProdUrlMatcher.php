<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * appProdUrlMatcher.
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appProdUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
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

        if (0 === strpos($pathinfo, '/log')) {
            if (0 === strpos($pathinfo, '/login')) {
                // _security_login
                if ($pathinfo === '/login') {
                    return array (  '_controller' => 'BaseBundle\\Controller\\SecurityController::loginAction',  '_route' => '_security_login',);
                }

                // _security_check
                if ($pathinfo === '/login_check') {
                    return array('_route' => '_security_check');
                }

            }

            // _security_logout
            if ($pathinfo === '/logout') {
                return array('_route' => '_security_logout');
            }

        }

        if (0 === strpos($pathinfo, '/e')) {
            // ef_connect
            if (0 === strpos($pathinfo, '/efconnect') && preg_match('#^/efconnect(?:/(?P<instance>[^/]++)(?:/(?P<homeFolder>[^/]++))?)?$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'ef_connect')), array (  '_controller' => 'FM\\ElfinderBundle\\Controller\\ElFinderController::loadAction',  'instance' => 'default',  'homeFolder' => '',));
            }

            // elfinder
            if (0 === strpos($pathinfo, '/elfinder') && preg_match('#^/elfinder(?:/(?P<instance>[^/]++)(?:/(?P<homeFolder>[^/]++))?)?$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'elfinder')), array (  '_controller' => 'FM\\ElfinderBundle\\Controller\\ElFinderController::showAction',  'instance' => 'default',  'homeFolder' => '',));
            }

        }

        if (0 === strpos($pathinfo, '/mail/s')) {
            // mail_default_index
            if (0 === strpos($pathinfo, '/mail/show') && preg_match('#^/mail/show/(?P<name>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'mail_default_index')), array (  '_controller' => 'MailBundle\\Controller\\DefaultController::indexAction',));
            }

            // mail_default_send
            if (0 === strpos($pathinfo, '/mail/send') && preg_match('#^/mail/send/(?P<name>[^/]++)/(?P<mail>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'mail_default_send')), array (  '_controller' => 'MailBundle\\Controller\\DefaultController::sendAction',));
            }

        }

        if (0 === strpos($pathinfo, '/api/json')) {
            // api_json_cruises
            if (0 === strpos($pathinfo, '/api/json/cruises') && preg_match('#^/api/json/cruises(?:/(?P<pre>[^/]++))?$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'api_json_cruises')), array (  'pre' => false,  '_controller' => 'BaseBundle\\Controller\\ApiController::cruisesAction',));
            }

            // api_json_kauta
            if (0 === strpos($pathinfo, '/api/json/kauta') && preg_match('#^/api/json/kauta/(?P<cruise_code>[^/]++)(?:/(?P<pre>[^/]++))?$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'api_json_kauta')), array (  'pre' => false,  '_controller' => 'BaseBundle\\Controller\\ApiController::kautaAction',));
            }

        }

        // cruise
        if ($pathinfo === '/cruise') {
            return array (  '_controller' => 'BaseBundle\\Controller\\CruiseController::indexAction',  '_route' => 'cruise',);
        }

        // image_resizer
        if (0 === strpos($pathinfo, '/images/ship') && preg_match('#^/images/ship/(?P<ship_name>[^/]++)/(?P<ship_image>[^/]++)$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'image_resizer')), array (  '_controller' => 'BaseBundle\\Controller\\PhotoController::imageAction',));
        }

        if (0 === strpos($pathinfo, '/log')) {
            // security_login_check
            if ($pathinfo === '/login_check') {
                return array (  '_controller' => 'BaseBundle\\Controller\\SecurityController::loginCheckAction',  '_route' => 'security_login_check',);
            }

            // security_logout
            if ($pathinfo === '/logout') {
                return array (  '_controller' => 'BaseBundle\\Controller\\SecurityController::logoutAction',  '_route' => 'security_logout',);
            }

        }

        if (0 === strpos($pathinfo, '/a')) {
            // ajax_zayavka_send
            if ($pathinfo === '/ajax/zayavka_send') {
                return array (  '_controller' => 'BaseBundle\\Controller\\ZayavkaSendAjaxController::indexAction',  '_route' => 'ajax_zayavka_send',);
            }

            // admin
            if ($pathinfo === '/admin') {
                return array (  '_controller' => 'AdminBundle\\Controller\\AdminController::indexAction',  '_route' => 'admin',);
            }

            // api_in_cruise_hot
            if (0 === strpos($pathinfo, '/api_in/cruise') && preg_match('#^/api_in/cruise/(?P<type>[^/]++)/(?P<code>[^/]++)/(?P<val>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'api_in_cruise_hot')), array (  '_controller' => 'AdminBundle\\Controller\\ApiInController::cruiseHotAction',));
            }

            if (0 === strpos($pathinfo, '/admin')) {
                if (0 === strpos($pathinfo, '/admin/page')) {
                    // page_admin
                    if (rtrim($pathinfo, '/') === '/admin/page') {
                        if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'HEAD'));
                            goto not_page_admin;
                        }

                        if (substr($pathinfo, -1) !== '/') {
                            return $this->redirect($pathinfo.'/', 'page_admin');
                        }

                        return array (  '_controller' => 'AdminBundle\\Controller\\DocumentController::indexAction',  '_route' => 'page_admin',);
                    }
                    not_page_admin:

                    // page_create
                    if ($pathinfo === '/admin/page/') {
                        if ($this->context->getMethod() != 'POST') {
                            $allow[] = 'POST';
                            goto not_page_create;
                        }

                        return array (  '_controller' => 'AdminBundle\\Controller\\DocumentController::createAction',  '_route' => 'page_create',);
                    }
                    not_page_create:

                    // page_new
                    if ($pathinfo === '/admin/page/new') {
                        if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'HEAD'));
                            goto not_page_new;
                        }

                        return array (  '_controller' => 'AdminBundle\\Controller\\DocumentController::newAction',  '_route' => 'page_new',);
                    }
                    not_page_new:

                    // page_show
                    if (preg_match('#^/admin/page/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                        if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'HEAD'));
                            goto not_page_show;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'page_show')), array (  '_controller' => 'AdminBundle\\Controller\\DocumentController::showAction',));
                    }
                    not_page_show:

                    // page_edit
                    if (preg_match('#^/admin/page/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                        if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'HEAD'));
                            goto not_page_edit;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'page_edit')), array (  '_controller' => 'AdminBundle\\Controller\\DocumentController::editAction',));
                    }
                    not_page_edit:

                    // page_update
                    if (preg_match('#^/admin/page/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                        if ($this->context->getMethod() != 'PUT') {
                            $allow[] = 'PUT';
                            goto not_page_update;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'page_update')), array (  '_controller' => 'AdminBundle\\Controller\\DocumentController::updateAction',));
                    }
                    not_page_update:

                    // page_delete
                    if (preg_match('#^/admin/page/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                        if ($this->context->getMethod() != 'DELETE') {
                            $allow[] = 'DELETE';
                            goto not_page_delete;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'page_delete')), array (  '_controller' => 'AdminBundle\\Controller\\DocumentController::deleteAction',));
                    }
                    not_page_delete:

                }

                // getshipsinfoflot
                if ($pathinfo === '/admin/getshipsinfoflot') {
                    return array (  '_controller' => 'AdminBundle\\Controller\\LoadInfoflotController::getShipsAction',  '_route' => 'getshipsinfoflot',);
                }

                // loadshipinfoflot
                if (0 === strpos($pathinfo, '/admin/loadshipinfoflot') && preg_match('#^/admin/loadshipinfoflot/(?P<ship_id>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'loadshipinfoflot')), array (  '_controller' => 'AdminBundle\\Controller\\LoadInfoflotController::loadShipAction',));
                }

                // getshipsmosturflot
                if ($pathinfo === '/admin/getshipsmosturflot') {
                    return array (  '_controller' => 'AdminBundle\\Controller\\LoadMosturflotController::getShipsAction',  '_route' => 'getshipsmosturflot',);
                }

                if (0 === strpos($pathinfo, '/admin/load')) {
                    if (0 === strpos($pathinfo, '/admin/loadship')) {
                        // loadshipmosturflot
                        if (0 === strpos($pathinfo, '/admin/loadshipmosturflot') && preg_match('#^/admin/loadshipmosturflot/(?P<ship_id>[^/]++)$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'loadshipmosturflot')), array (  '_controller' => 'AdminBundle\\Controller\\LoadMosturflotController::loadShipAction',));
                        }

                        // loadship
                        if ($pathinfo === '/admin/loadship') {
                            return array (  '_controller' => 'AdminBundle\\Controller\\LoadShipController::loadshipAction',  '_route' => 'loadship',);
                        }

                        // loadshipdo
                        if ($pathinfo === '/admin/loadshipdo') {
                            return array (  '_controller' => 'AdminBundle\\Controller\\LoadShipController::loadshipDoAction',  '_route' => 'loadshipdo',);
                        }

                    }

                    if (0 === strpos($pathinfo, '/admin/loadvodohod')) {
                        // loadvodohod
                        if ($pathinfo === '/admin/loadvodohod') {
                            return array (  '_controller' => 'AdminBundle\\Controller\\LoadVodohodController::loadAction',  '_route' => 'loadvodohod',);
                        }

                        // loadvodohod_ship
                        if (0 === strpos($pathinfo, '/admin/loadvodohod_ship') && preg_match('#^/admin/loadvodohod_ship(?:/(?P<ship_id>[^/]++))?$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'loadvodohod_ship')), array (  'ship_id' => NULL,  '_controller' => 'AdminBundle\\Controller\\LoadVodohodController::indexAction',));
                        }

                    }

                }

            }

        }

        // image_resize
        if ($pathinfo === '/image') {
            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'HEAD'));
                goto not_image_resize;
            }

            return array (  '_controller' => 'BaseBundle\\Controller\\PhotoController::imageAction',  '_route' => 'image_resize',);
        }
        not_image_resize:

        if (0 === strpos($pathinfo, '/cruise/order')) {
            // cruiseorder
            if ($pathinfo === '/cruise/order.html') {
                return array (  '_controller' => 'BaseBundle\\Controller\\OrderController::indexAction',  '_route' => 'cruiseorder',);
            }

            // cruiseorder_code
            if (preg_match('#^/cruise/order/(?P<code>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'cruiseorder_code')), array (  '_controller' => 'BaseBundle\\Controller\\OrderController::indexAction',));
            }

        }

        // homepage
        if (rtrim($pathinfo, '/') === '') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'homepage');
            }

            return array (  '_controller' => 'BaseBundle\\Controller\\DocumentController::indexAction',  '_route' => 'homepage',);
        }

        // specialoffer
        if (0 === strpos($pathinfo, '/specialoffer') && preg_match('#^/specialoffer/(?P<offer>[^/\\.]++)\\.html$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'specialoffer')), array (  '_controller' => 'BaseBundle\\Controller\\CruiseController::specialofferAction',));
        }

        if (0 === strpos($pathinfo, '/cruise')) {
            // cruisedetails
            if (0 === strpos($pathinfo, '/cruise/cruisedetails') && preg_match('#^/cruise/cruisedetails/(?P<url>[^/\\.]++)\\.html$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'cruisedetails')), array (  '_controller' => 'BaseBundle\\Controller\\CruiseController::detailsAction',));
            }

            // monthschedule
            if ($pathinfo === '/cruise/monthschedule') {
                return array (  '_controller' => 'BaseBundle\\Controller\\CruiseController::scheduleAction',  '_route' => 'monthschedule',);
            }

            // cruiseroutes
            if ($pathinfo === '/cruise/routes.html') {
                return array (  '_controller' => 'BaseBundle\\Controller\\DocumentController::routesAction',  '_route' => 'cruiseroutes',);
            }

            // categoryroutes
            if (0 === strpos($pathinfo, '/cruise/categoryroutes') && preg_match('#^/cruise/categoryroutes/(?P<category>[^/\\.]++)\\.html$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'categoryroutes')), array (  '_controller' => 'BaseBundle\\Controller\\CruiseController::categoryroutesAction',));
            }

            // month_cruises
            if (0 === strpos($pathinfo, '/cruise/month') && preg_match('#^/cruise/month/(?P<month>[^/\\.]++)\\.html$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'month_cruises')), array (  '_controller' => 'BaseBundle\\Controller\\CruiseController::monthAction',));
            }

            // ship
            if (0 === strpos($pathinfo, '/cruise/ship') && preg_match('#^/cruise/ship/(?P<ship>[^/\\.]++)\\.html$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'ship')), array (  '_controller' => 'BaseBundle\\Controller\\CruiseController::shipAction',));
            }

        }

        // page
        if (preg_match('#^/(?P<first>[^/]++)/(?P<second>[^/]++)/(?P<name>[^/\\.]++)\\.html$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'page')), array (  '_controller' => 'BaseBundle\\Controller\\DocumentController::pageAction',));
        }

        // search
        if ($pathinfo === '/search') {
            return array (  '_controller' => 'BaseBundle\\Controller\\CruiseController::searchAction',  '_route' => 'search',);
        }

        // page_small
        if (preg_match('#^/(?P<first>[^/\\.]++)\\.html$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'page_small')), array (  '_controller' => 'BaseBundle\\Controller\\DocumentController::pageAction',));
        }

        if (0 === strpos($pathinfo, '/cruise')) {
            // classlist
            if ($pathinfo === '/cruise/classlist') {
                return array (  '_controller' => 'BaseBundle\\Controller\\ShipController::classlistAction',  '_route' => 'classlist',);
            }

            // alphabetlist
            if ($pathinfo === '/cruise/alphabetlist') {
                return array (  '_controller' => 'BaseBundle\\Controller\\ShipController::alphabetlistAction',  '_route' => 'alphabetlist',);
            }

        }

        // showDocuments
        if (preg_match('#^/(?P<first>[^/]++)/(?P<second>[^/]++)/?$#s', $pathinfo, $matches)) {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'showDocuments');
            }

            return $this->mergeDefaults(array_replace($matches, array('_route' => 'showDocuments')), array (  '_controller' => 'BaseBundle\\Controller\\DocumentCategoryController::documentsAction',));
        }

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
