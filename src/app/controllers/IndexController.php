<?php

use Phalcon\Mvc\Controller;

/**
 * Class to simple use of API
 */
class IndexController extends Controller
{
    /**
     * Location search
     * Api call
     *
     * @return void
     */    
    public function indexAction()
    {
        if ($this->request->isPost()) {
            $q = $this->request->getPost('search');
            $key=$this->di->get('config')->get('app')->get('key');
            $client=$this->di->get('client');
            $response=$client->request('GET', 'search.json?key='.$key.'&q='.$q.'');
            $this->view->locations=json_decode($response->getBody(), true);
        } 
    }
    /**
     * Function for, Current weather
     *
     * @param [type] $q
     * @return void
     */
    public function detailsAction($q)
    {
        $key=$this->di->get('config')->get('app')->get('key');
        $client = $this->di->get('client');
        $response=$client->request('GET', 'current.json?key='.$key.'&q='.urlencode($q).'');
        $this->view->details=json_decode($response->getBody(), true);
    }

    /**
     * Function to get forecast
     *
     * @param [type] $q
     * @return void
     */

    public function forecastAction($q)
    {
        $key=$this->di->get('config')->get('app')->get('key');
        $client = $this->di->get('client');
        $response=$client->request('GET', 'forecast.json?key='.$key.'&q='.$q.'&days=3');
        $this->view->details=json_decode($response->getBody(), true);
    }

    /**
     * Function to get history of current day
     *
     * @param [type] $q
     * @return void
     */

    public function historyAction($q)
    {
        $key=$this->di->get('config')->get('app')->get('key');
        $client = $this->di->get('client');
        $response=$client->request('GET', 'forecast.json?key='.$key.'&q='.$q.'&dt='.date('Y-m-d').'');
        $this->view->details=json_decode($response->getBody(), true);
    }

    /**
     * Function to get timezone
     *
     * @param [type] $q
     * @return void
     */

    public function timezoneAction($q)
    {
        $key=$this->di->get('config')->get('app')->get('key');
        $client = $this->di->get('client');
        $response=$client->request('GET', 'timezone.json?key='.$key.'&q='.urlencode($q).'');
        $this->view->details=json_decode($response->getBody(), true);
    }

    /**
     * Function to get sports data of that location
     *
     * @param [type] $q
     * @return void
     */

    public function sportsAction($q)
    {
        $key=$this->di->get('config')->get('app')->get('key');
        $client = $this->di->get('client');
        $response=$client->request('GET', 'sports.json?key='.$key.'&q='.urlencode($q).'');
        $this->view->details=json_decode($response->getBody(), true);
    }

    /**
     * function to get astronomy details of a location
     *
     * @param [type] $q
     * @return void
     */

    public function astronomyAction($q)
    {
        $key=$this->di->get('config')->get('app')->get('key');
        $client = $this->di->get('client');
        $response=$client->request('GET', 'astronomy.json?key='.$key.'&q='.urlencode($q).'');
        $this->view->details=json_decode($response->getBody(), true);
    }

    /**
     * function to get weather alerts of a location
     *
     * @param [type] $q
     * @return void
     */

    public function weatherAlertAction($q)
    {
        $key=$this->di->get('config')->get('app')->get('key');
        $client = $this->di->get('client');
        $response=$client->request('GET', 'forecast.json?key='.$key.'&q='.$q.'&days=1&alerts=yes');
        $this->view->details=json_decode($response->getBody(), true);
    }

    /**
     * Function to get airquality of a location
     *
     * @param [type] $q
     * @return void
     */
    public function airQualityAction($q)
    {
        $key=$this->di->get('config')->get('app')->get('key');
        $client = $this->di->get('client');
        $response=$client->request('GET', 'forecast.json?key='.$key.'&q='.$q.'&days=1&aqi=yes');
        $this->view->details=json_decode($response->getBody(), true);
    }
}
