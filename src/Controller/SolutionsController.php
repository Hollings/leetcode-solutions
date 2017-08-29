<?php // src/Controller/SolutionsController.php

namespace App\Controller;
use Sunra\PhpSimple\HtmlDomParser;

class SolutionsController extends AppController
{
    public function index()
    {
        $solutions = $this->Solutions->find('all', array(
             'order'=>array('FIELD(Solutions.difficulty, "Easy", "Medium", "Hard") DESC')
            ));

        $this->set(compact('solutions'));
    }
    
    public function view($id = null)
    {
        $solution = $this->Solutions->get($id);
        $this->set(compact('solution'));
    }

    public function add()
    {

        $solution = $this->Solutions->newEntity();
        if ($this->request->is('post')) {
            
            $solution->link = $this->request->data('link');
            $solution->body = $this->request->data('body');

            $scrapedData = $this->scrapeLeetData($solution->link);

            $solution->title = trim(strip_tags($scrapedData[0]));
            $solution->description = $scrapedData[1];
            $solution->difficulty = trim(strip_tags($scrapedData[2]));

            // $scrapedData = $this->scrapeLeetData($solution->link);
            // $solution->title = 
            if ($this->Solutions->save($solution)) {
                $this->Flash->success(__('Your solution has been saved.'));
                return $this->redirect(['action' => 'add']);
            }
            $this->Flash->error(__('Unable to add your solution.'));

        }
        $this->set('solution', $solution);
    }
    private function scrapeLeetData($url)
    {
        $string = $this->getWebPage($url);
        $html = HtmlDomParser::str_get_html($string['content']);

        $description = ($html->find('div.question-description'))[0];
        $title = ($html->find('h3'))[0];
        $difficulty = ($html->find('span.difficulty-label'))[0];
        return [$title,$description, $difficulty];
    }
     /**
     * Get a web file (HTML, XHTML, XML, image, etc.) from a URL.  Return an
     * array containing the HTTP server response header fields and content.
     */
    private function getWebPage( $url )
    {
        $user_agent='Mozilla/5.0 (Windows NT 6.1; rv:8.0) Gecko/20100101 Firefox/8.0';

        $options = array(

            CURLOPT_CUSTOMREQUEST  =>"GET",        //set request type post or get
            CURLOPT_POST           =>false,        //set to GET
            CURLOPT_USERAGENT      => $user_agent, //set user agent
            CURLOPT_COOKIEFILE     =>"cookie.txt", //set cookie file
            CURLOPT_COOKIEJAR      =>"cookie.txt", //set cookie jar
            CURLOPT_RETURNTRANSFER => true,     // return web page
            CURLOPT_HEADER         => false,    // don't return headers
            CURLOPT_FOLLOWLOCATION => true,     // follow redirects
            CURLOPT_ENCODING       => "",       // handle all encodings
            CURLOPT_AUTOREFERER    => true,     // set referer on redirect
            CURLOPT_CONNECTTIMEOUT => 120,      // timeout on connect
            CURLOPT_TIMEOUT        => 120,      // timeout on response
            CURLOPT_MAXREDIRS      => 10,       // stop after 10 redirects
        );

        $ch      = curl_init( $url );
        curl_setopt_array( $ch, $options );
        $content = curl_exec( $ch );
        $err     = curl_errno( $ch );
        $errmsg  = curl_error( $ch );
        $header  = curl_getinfo( $ch );
        curl_close( $ch );

        $header['errno']   = $err;
        $header['errmsg']  = $errmsg;
        $header['content'] = $content;
        return $header;
    }
}