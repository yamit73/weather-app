<?php

use Phalcon\Mvc\Controller;
use GuzzleHttp\Client;
/**
 * Class to simple use of API
 */
class IndexController extends Controller
{
    /**
     * Book search
     * Api call
     *
     * @return void
     */    
    public function indexAction()
    {
        if ($this->request->isPost()) {
            $q = $this->request->getPost('search');
            $key='0bab7dd1bacc418689b143833220304';
            $client = new Client([
                // Base URI is used with relative requests
                'base_uri' => 'http://api.weatherapi.com/v1/',
            ]);
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
        $key='0bab7dd1bacc418689b143833220304';
        $client = new Client([
            // Base URI is used with relative requests
            'base_uri' => 'http://api.weatherapi.com/v1/',
        ]);
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
        $key='0bab7dd1bacc418689b143833220304';
        $client = new Client([
            // Base URI is used with relative requests
            'base_uri' => 'http://api.weatherapi.com/v1/',
        ]);
        $response=$client->request('GET', 'forecast.json?key='.$key.'&q='.$q.'&days=10&aqi=yes&alerts=yes');
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
        $key='0bab7dd1bacc418689b143833220304';
        $client = new Client([
            // Base URI is used with relative requests
            'base_uri' => 'http://api.weatherapi.com/v1/',
        ]);
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
        $key='0bab7dd1bacc418689b143833220304';
        $client = new Client([
            // Base URI is used with relative requests
            'base_uri' => 'http://api.weatherapi.com/v1/',
        ]);
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
        $key='0bab7dd1bacc418689b143833220304';
        $client = new Client([
            // Base URI is used with relative requests
            'base_uri' => 'http://api.weatherapi.com/v1/',
        ]);
        $response=$client->request('GET', 'sports.json?key='.$key.'&q='.urlencode($q).'');
        $this->view->details=json_decode($response->getBody(), true);
    }
    public function astronomyAction($q)
    {
        $key='0bab7dd1bacc418689b143833220304';
        $client = new Client([
            // Base URI is used with relative requests
            'base_uri' => 'http://api.weatherapi.com/v1/',
        ]);
        $response=$client->request('GET', 'astronomy.json?key='.$key.'&q='.urlencode($q).'');
        $this->view->details=json_decode($response->getBody(), true);
    }
    public function weather_alertAction($q)
    {
        $key='0bab7dd1bacc418689b143833220304';
        $client = new Client([
            // Base URI is used with relative requests
            'base_uri' => 'http://api.weatherapi.com/v1/',
        ]);
        $response=$client->request('GET', 'current.json?key='.$key.'&q='.urlencode($q).'');
        $this->view->details=json_decode($response->getBody(), true);
    }
    public function air_qualityAction($q)
    {
        $key='0bab7dd1bacc418689b143833220304';
        $client = new Client([
            // Base URI is used with relative requests
            'base_uri' => 'http://api.weatherapi.com/v1/',
        ]);
        $response=$client->request('GET', 'current.json?key='.$key.'&q='.urlencode($q).'');
        $this->view->details=json_decode($response->getBody(), true);
    }
}
