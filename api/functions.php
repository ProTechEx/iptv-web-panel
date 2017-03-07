<?php
$GLOBALS['cdn'] = 'http://greektv.upg.gr/img/';
function db_connect()
{
    static $connection;
    if (!isset($connection)) {
        $config = parse_ini_file('../../gtv_db.ini');
        $connection = mysqli_connect($config['host'], $config['username'], $config['password'], $config['dbname']);
    }
    if ($connection === false) {
        return mysqli_connect_error();
    }

    return $connection;
}

function db_query($query)
{
    $connection = db_connect();
    $result = mysqli_query($connection, $query);

    return $result;
}

$allitems = 'select * from content order by ord desc';
$activeitems = 'select * from content where active = 1 order by ord desc';

function startapi()
{
    if (isset($_GET['type'])) {
        switch ($_GET['type']) {

        case 'greekchannels':
        $aaData = array();
        header('Content-Type: application/json');
            db_connect();
            $rows = array();
            $query ="select * from greekchannels";
            $result = db_query($query);
            if ($result === false) {
                return false;
            }
            while ($row = mysqli_fetch_assoc($result)) {
                $aaData[] = $row;
            }
            $response = array(
          'data' => $aaData,
        );
        if (isset($_REQUEST['sEcho'])) {
            $response['sEcho'] = $_REQUEST['sEcho'];
        }

        echo json_encode($response);

            break;

                case 'greekchannels':
                $aaData = array();
                header('Content-Type: application/json');
                    db_connect();
                    $rows = array();
                    $query ="select * from greekchannels";
                    $result = db_query($query);
                    if ($result === false) {
                        return false;
                    }
                    while ($row = mysqli_fetch_assoc($result)) {
                        $aaData[] = $row;
                    }
                    $response = array(
                  'data' => $aaData,
                );
                if (isset($_REQUEST['sEcho'])) {
                    $response['sEcho'] = $_REQUEST['sEcho'];
                }

                echo json_encode($response);

                    break;


            case 'addstream':
  if (isset($_GET['channelid']) & isset($_GET['streamurl']) & isset($_GET['streamformat']) & isset($_GET['active']) & isset($_GET['ishd']) & isset($_GET['user'])) {
                db_connect();
                $channelid = $_GET['channelid'];
                $streamurl = $_GET['streamurl'];
                $streamformat = $_GET['streamformat'];
                $active = $_GET['active'];
                $ishd = $_GET['ishd'];
                $user = $_GET['user'];
                $query ="insert into streams (channelid,streamurl,streamformat,active,ishd,user) VALUES ('$channelid','$streamurl','$streamformat','$active','$ishd','$user')";
            //    echo $query;
                $result = db_query($query);
                if ($result === false) {
                    return false;
                }
            echo '<meta http-equiv="refresh" content="0; url=/admin/?thepath=streamurls" />';
          }
          else {echo '<meta http-equiv="refresh" content="0; url=/admin/?thepath=streamurls" />';}
                break;

                case 'editstream':
              if (isset($_GET['streamid']) & isset($_GET['channelid']) & isset($_GET['streamurl']) & isset($_GET['streamformat']) & isset($_GET['active']) & isset($_GET['ishd']) & isset($_GET['user'])) {
                    db_connect();
                    $streamid = $_GET['streamid'];
                    $channelid = $_GET['channelid'];
                    $streamurl = $_GET['streamurl'];
                    $streamformat = $_GET['streamformat'];
                    $active = $_GET['active'];
                    $ishd = $_GET['ishd'];
                    $user = $_GET['user'];
                    $query ="UPDATE streams SET channelid = '$channelid', streamurl = '$streamurl',streamformat = '$streamformat',active = '$active',ishd = '$ishd',user = '$user' where id = '$streamid'";
              //      echo $query;
                    $result = db_query($query);
                    if ($result === false) {
                        return false;
                    }
                echo '<meta http-equiv="refresh" content="0; url=/admin/?thepath=streamurls" />';
              }
              else {echo '<meta http-equiv="refresh" content="0; url=/admin/?thepath=streamurls" />';
              }
                    break;

                    case 'editchannel1':
                    echo '?';
                  if (isset($_GET['title']) & isset($_GET['region']) & isset($_GET['type']) & isset($_GET['description']) & isset($_GET['sdimage']) & isset($_GET['sdimage']) & isset($_GET['hdimage']) ) {
                        db_connect();
                        $channelid = $_GET['channelid'];
                        $title = $_GET['title'];
                        $region = $_GET['region'];
                        $type = $_GET['type'];
                        $description = $_GET['description'];
                        $sdimage = $_GET['sdimage'];
                        $hdimage = $_GET['hdimage'];
                        $order = $_GET['order'];
                        $query ="UPDATE greekchannels SET title = '$title', region = '$region',type = '$type',description = '$description',sd_image = '$sdimage',hd_image = '$hdimage',channel_order = '$order' where id = '$channelid'";
                        echo $query;
                        $result = db_query($query);
                        if ($result === false) {
                            return false;
                        }
                    echo '<meta http-equiv="refresh" content="0; url=/admin/?thepath=greekchannels" />';
                    echo '???';
                  }
                  else {echo '<meta http-equiv="refresh" content="0; url=/admin/?thepath=greekchannels" />';
                    echo '???????';
                  }
                        break;

                        case 'editchannel':
                      if (isset($_GET['title']) & isset($_GET['region']) & isset($_GET['thetype']) & isset($_GET['description']) & isset($_GET['sdimage']) & isset($_GET['sdimage']) & isset($_GET['hdimage']) ) {
                            db_connect();
                            $channelid = $_GET['channelid'];
                            $title = $_GET['title'];
                            $region = $_GET['region'];
                            $type = $_GET['thetype'];
                            $description = $_GET['description'];
                            $sdimage = $_GET['sdimage'];
                            $hdimage = $_GET['hdimage'];
                            $order = $_GET['order'];
                            $query ="UPDATE greekchannels SET title = '$title', region = '$region',type = '$type',description = '$description',sd_image = '$sdimage',hd_image = '$hdimage',channel_order = '$order' where id = '$channelid'";
                        //    echo $query;
                            $result = db_query($query);
                            if ($result === false) {
                                return false;
                            }
                        echo '<meta http-equiv="refresh" content="0; url=/admin/?thepath=greekchannels" />';
                      }
                      else {echo '<meta http-equiv="refresh" content="0; url=/admin/?thepath=greekchannels" />';
                      }
                            break;

                        case 'addchannel':
                      if (isset($_GET['title']) & isset($_GET['region']) & isset($_GET['thetype']) & isset($_GET['description']) & isset($_GET['sdimage']) & isset($_GET['sdimage']) & isset($_GET['hdimage'])) {
                            db_connect();
                            $title = $_GET['title'];
                            $region = $_GET['region'];
                            $type = $_GET['thetype'];
                            $description = $_GET['description'];
                            $sdimage = $_GET['sdimage'];
                            $hdimage = $_GET['hdimage'];
                            $order = $_GET['order'];
                            $query ="insert into greekchannels (title,region,type,description,sd_image,hd_image,channel_order) VALUES ('$title','$region','$type','$description','$sdimage','$hdimage','$order')";
                      //      echo $query;
                            $result = db_query($query);
                            if ($result === false) {
                                return false;
                            }
                        echo '<meta http-equiv="refresh" content="0; url=/admin/?thepath=greekchannels" />';
                      }
                      else {echo '<meta http-equiv="refresh" content="0; url=/admin/?thepath=greekchannels" />';}
                            break;

                case 'deletestream':
      if (isset($_GET['streamid'])) {
                    db_connect();
                    $streamid= $_GET['streamid'];
                    $query ="delete from streams where id = '$streamid'";
                //    echo $query;
                    $result = db_query($query);
                    if ($result === false) {
                        return false;
                    }
                echo '<meta http-equiv="refresh" content="0; url=/admin/?thepath=streamurls" />';
              }
              else {echo '<meta http-equiv="refresh" content="0; url=/admin/?thepath=streamurls" />';}
                    break;

                    case 'deletechannel':
          if (isset($_GET['channelid'])) {
                        db_connect();
                        $channelid= $_GET['channelid'];
                        $query ="delete from greekchannels where id = '$channelid'";
                    //    echo $query;
                        $result = db_query($query);
                        if ($result === false) {
                            return false;
                        }
                    echo '<meta http-equiv="refresh" content="0; url=/admin/?thepath=greekchannels" />';
                  }
                  else {echo '<meta http-equiv="refresh" content="0; url=/admin/?thepath=greekchannels" />';}
                        break;

            case 'streams':
            $aaData = array();
            header('Content-Type: application/json');
                db_connect();
                $rows = array();
                $query ="select streams.id,channelid,streamurl,streamformat,active,ishd,bitrate,user,greekchannels.title AS channel from streams left join greekchannels on streams.channelid = greekchannels.id where channelid != 0";
                $result = db_query($query);
                if ($result === false) {
                    return false;
                }
                while ($row = mysqli_fetch_assoc($result)) {
                    $aaData[] = $row;
                }
                $response = array(
              'data' => $aaData,
            );
            if (isset($_REQUEST['sEcho'])) {
                $response['sEcho'] = $_REQUEST['sEcho'];
            }

            echo json_encode($response);

                break;

                case 'channelnames':
                $aaData = array();
                header('Content-Type: application/json');
                    db_connect();
                    $rows = array();
                    $query ="select id,title from greekchannels";
                    $result = db_query($query);
                    if ($result === false) {
                        return false;
                    }
                    while ($row = mysqli_fetch_assoc($result)) {
                        $aaData[] = $row;
                    }


                echo json_encode($aaData);

                    break;

        case 'kodi':
        header('Content-Type: text/plain');
            db_connect();
            echo db_select("select greekchannels.title,greekchannels.channel_order,greekchannels.sd_image,streams.streamurl from greekchannels JOIN streams on greekchannels.id = streams.channelid where greekchannels.type = 'video' and streams.active = '1' and streams.private != 1 order by greekchannels.channel_order desc", 'kodi');
            break;

            case 'ripurl':
            header('Content-Type: text/plain');
                converturl($_GET['url']);
                break;

                case 'ripm3ulist':
                header('Content-Type: text/plain');
                    convertm3uurl($_GET['url'],$_GET['type2']);
                    break;

                    case 'm3u2xml':
                    header('Content-Type: application/json');
                        convertm3u2xml($_GET['url'],$_GET['type2']);
                        break;

                    case 'ripm3ulist2':
                    header('Content-Type: text/plain');
                        convertm3uurl2($_GET['url'],$_GET['type2']);
                        break;


                                    case 'enterdb':

                                        enterdb($_GET['url'],$_GET['type2']);
                                        break;


case 'tvos':
    header('Content-Type: application/javascript');
        db_connect();
        echo 'var Template = function() { return `<?xml version="1.0" encoding="UTF-8" ?><document><catalogTemplate><banner><title>Greek TV by UPG.GR</title></banner><list><section><listItemLockup><title>Greek TV</title><decorationLabel>Live</decorationLabel><relatedContent><grid><section>';
        echo db_select("select greekchannels.title,greekchannels.channel_order,greekchannels.description,greekchannels.sd_image,greekchannels.hd_image,greekchannels.region,greekchannels.type,streams.streamurl,streams.streamformat,streams.active,streams.ishd from greekchannels join streams on greekchannels.id = streams.channelid where greekchannels.type = 'video' and streams.active = '1' AND streams.exclude != 1   and streams.private != 1 order by greekchannels.channel_order desc", 'tvos');
        echo '</section></grid></relatedContent></listItemLockup></section>';
        echo '<section><listItemLockup><title>Greek Radio</title><decorationLabel>Live</decorationLabel><relatedContent><grid><section>';
        echo db_select("select greekchannels.title,greekchannels.channel_order,greekchannels.description,greekchannels.sd_image,greekchannels.hd_image,greekchannels.region,greekchannels.type,streams.streamurl,streams.streamformat,streams.active,streams.ishd from greekchannels join streams on greekchannels.id = streams.channelid where greekchannels.type = 'radio' and streams.active = '1'  and streams.exclude != 1 and streams.private != 1 order by greekchannels.channel_order desc", 'tvos');
        echo '</section></grid></relatedContent></listItemLockup></section>';
        echo '</list></catalogTemplate></document>`}';
        break;
case 'web':
        header('Content-Type: text/xml');
        db_connect();
        echo '<?xml version="1.0" encoding="UTF-8"?><orml version="1.2" xmlns="http://sourceforge.net/p/openrokn/home/ORML"><channel> <item type="poster" style="flat-episodic-16x9" title="GREEK TV" shortdesc="GreekTV" sdposterurl="pkg:/images/sdvideos.png" hdposterurl="pkg:/images/hdvideos.png">';
        echo db_select("select greekchannels.title,greekchannels.channel_order,greekchannels.description,greekchannels.sd_image,greekchannels.hd_image,greekchannels.region,greekchannels.type,streams.streamurl,streams.streamformat,streams.active,streams.ishd from greekchannels join streams on greekchannels.id = streams.channelid where streams.active = '1' and greekchannels.region = '".$row['region']."' AND streams.exclude != 1 and streams.private != 1 order by greekchannels.channel_order desc", 'web');
        echo '</item></channel></orml>';
        break;
case 'plex':
        header('Content-Type: text/xml');
        db_connect();
        echo '<?xml version="1.0" encoding="UTF-8"?><orml version="1.2" xmlns="http://sourceforge.net/p/openrokn/home/ORML"><channel> <item type="poster" style="flat-episodic-16x9" title="GREEK TV" shortdesc="GreekTV" sdposterurl="pkg:/images/sdvideos.png" hdposterurl="pkg:/images/hdvideos.png">';
        echo db_select("select greekchannels.id, greekchannels.title,greekchannels.channel_order,greekchannels.description,greekchannels.sd_image,greekchannels.hd_image,greekchannels.region,greekchannels.type,streams.streamurl,streams.streamformat,streams.active,streams.ishd from greekchannels join streams on greekchannels.id = streams.channelid where greekchannels.type = 'video' and streams.active = '1'  and streams.exclude != 1 and streams.private != 1 order by greekchannels.channel_order desc", 'plex');
        echo '</item></channel></orml>';
        break;

case 'unixml':
            header("Content-Type: application/xml; charset=UTF-8");
            db_connect();
            echo '<?xml version="1.0" encoding="UTF-8"?><rss version="2.0"><channel><title>GreekTV by upg.gr</title><description>Greek TV video feed</description><link>http://greektv.upg.gr</link>';
            echo db_select("select greekchannels.id,greekchannels.title,greekchannels.channel_order,greekchannels.description,greekchannels.sd_image,greekchannels.hd_image,greekchannels.region,greekchannels.type,streams.streamurl,streams.streamformat,streams.active,streams.ishd from greekchannels join streams on greekchannels.id = streams.channelid where greekchannels.type = 'video' and streams.active = '1'  and streams.exclude != 1 and streams.private != 1 order by greekchannels.channel_order desc", 'unixml');
            echo '</channel></rss>';
            break;

case 'unijson':
                header('Content-Type: application/json');
                db_connect();
                echo db_select("select greekchannels.id,greekchannels.title,greekchannels.channel_order,greekchannels.description,greekchannels.sd_image,greekchannels.hd_image,greekchannels.region,greekchannels.type,streams.streamurl,streams.streamformat,streams.active,streams.ishd from greekchannels join streams on greekchannels.id = streams.channelid where streams.active = '1' AND streams.exclude != 1 and streams.private != 1 order by greekchannels.channel_order desc", 'unijson');
                break;


    case 'all':
         db_connect();
        echo db_select('select * from greekchannels order by ord desc', 'all');
        break;
    case 'Select api response':
        echo '';
        break;
    case 'vlc':
    header('Content-Type: audio/mpegurl;');
  //header('Content-Type: text');
     db_connect();
        echo "#EXTM3U\r\n";
        echo db_select("select greekchannels.title,greekchannels.channel_order,greekchannels.description,greekchannels.sd_image,greekchannels.hd_image,greekchannels.region,greekchannels.type,streams.streamurl,streams.streamformat,streams.active,streams.ishd from greekchannels join streams on greekchannels.id = streams.channelid where greekchannels.type = 'video' and streams.active = '1' and streams.exclude != 1 and streams.private != 1 order by greekchannels.channel_order desc", 'vlc');
    break;
    case 'findactive':
         db_connect();
        echo db_select('select * from streams WHERE streams.private != 1 and streams.exclude != 1', 'findactive');
        break;

        case 'removeinactive':
             db_connect();
            echo db_select('select * from streams where timesinactive > 250 and streams.private != 1', 'removeinactive');
            break;


        case 'skaiurl':
        $url = "www.skai.gr/player/tvlive/";
        $ch = curl_init();
$timeout = 5;
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
$data = curl_exec($ch);
curl_close($ch);
$re = "/<span itemprop=\"contentUrl\" href=\"(.*?)\"><\\/span>/";
preg_match($re, $data, $matches);
echo 'https://www.youtube.com/watch?v='.$matches[1];
break;

case 'skaiurl_redirected':
$url = "www.skai.gr/player/tvlive/";
$ch = curl_init();
$timeout = 5;
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
$data = curl_exec($ch);
curl_close($ch);
$re = "/<span itemprop=\"contentUrl\" href=\"(.*?)\"><\\/span>/";
preg_match($re, $data, $matches);
$theurl = 'https://www.youtube.com/watch?v='.$matches[1];
header("Location: $theurl");
break;

case 'pi1':
$url = "rtmp://37.48.118.105:1935/ionian/rpi";
header("Location: $url");
break;


}
    } else {
        echo "Nothing to see here";
    }
}

function db_select($query, $type)
{
    $rows = array();
    $result = db_query($query);
    if ($result === false) {
        return false;
    }
    $aaData = array();
    $dbres = '';
    while ($row = mysqli_fetch_assoc($result)) {
        switch ($_GET['type']) {




        case 'kodi':
        $dbres .= "<item>\r\n<title>".$row['title']."</title>\r\n<link>".$row['streamurl']."</link>\r\n<thumbnail>".$GLOBALS['cdn'].$row['sd_image']."</thumbnail>\r\n</item>\r\n\r\n";
            break;
    case 'tvos':
    $dbres .= '<lockup videoURL="'.$row['streamurl'].'"><img src="'.$GLOBALS['cdn'].$row['hd_image'].'" width="250" height="150" /></lockup>';
        break;
    case 'web':
    $dbres .= '<item url="'.$row['streamurl'].'" title="'.$row['title'].'" shortdesc="'.$row['description'].'" sdposterurl="'.$GLOBALS['cdn'].$row['sd_image'].'"  type="'.$row['type'].'"></item>';
        break;
    case 'plex':
    $dbres .= '<item id="'.$row['id'].'" url="'.$row['streamurl'].'" title="'.$row['title'].'" shortdesc="'.$row['description'].'" sdposterurl="'.$GLOBALS['cdn'].$row['sd_image'].'" hdposterurl="'.$GLOBALS['cdn'].$row['hd_image'].'" type="'.$row['type'].'" active="'.$row['active'].'" genre1="'.$row['region'].'" ishd="'.$row['ishd'].'" ></item>';
        break;
    case 'unixml':
        $dbres .= '
        <item>
        <title>'.$row['title'].'</title>
        <description>'.$row['description'].'</description>
        <link>'.$row['streamurl'].'</link>
        <category>'.$row['type'].'</category>
        <image>'.$GLOBALS['cdn'].$row['sd_image'].'</image>
        <imagehd>'.$GLOBALS['cdn'].$row['hd_image'].'</imagehd>
        <pubDate>'.date('r', time()).'</pubDate>
        <guid isPermaLink="false">'.$row['streamurl'].'</guid>
        </item>';
            break;

            case 'unijson':
        $dbres .= '
        <a href="/upg_player.html?play='.$row['streamurl'].'&poster=img/'.$row['sd_image'].'&type='.$row['type'].'&channel='.$row['title'].'">
        <li class="clearfix">
        <img width="70px" height="70px" src="'.$GLOBALS['cdn'].$row['hd_image'].'" alt="'.$row['description'].'" class="thumbnail">
        <h2>'.$row['title'].'</h2>
        <p class="desc">'.$row['description'].'</p>
        <span class="price">'.$row['type'].'</span>
        </li>
        </a>';
                break;


    case 'vlc':
    $dbres .= "#EXTINF:0, logo=\"".$row['sd_image']."\",".$row['title']."\r\n".$row['streamurl']."\r\n";
        break;
    case 'findactive' :
    ini_set('default_socket_timeout', 10);
    if (is_url_exist($row['streamurl'])) {
    //    $dbres = 'done - go check <a href="http://greektv.upg.gr/api/?type=all">all channels</a>';
        $constquery = "UPDATE streams SET active=1,timesinactive = timesinactive-1 where id ='".$row['id']."'";
        echo '========='.$row['streamurl'].' set to active<br>';
        db_query($constquery);
    } else {
        $constquery = "UPDATE streams SET active=0, timesinactive = timesinactive+1 where id ='".$row['id']."'";
        echo '========='.$row['streamurl'].' set to INACTIVE<br>';
        db_query($constquery);

    }
        break;

        case 'removeinactive' :

        if ($row['timesinactive'] > 250) {
        //    $dbres = 'done - go check <a href="http://greektv.upg.gr/api/?type=all">all channels</a>';
            $constquery = "delete from streams where id ='".$row['id']."'";
            echo $row['streamurl'].' has been inactive more than '.$row['timesinactive'].' times - deleting<br>';
        //    echo $constquery.'<br />';
            db_query($constquery);
        } else {
          echo 'nothing found';
        }
            break;


    case 'all':
    $dbres .= $row['title'].' - '.$row['active'].'<br>';
        break;
        }
    }
    return $dbres;
}

function db_error()
{
    $connection = db_connect();

    return mysqli_error($connection);
}

function db_quote($value)
{
    $connection = db_connect();

    return "'".mysqli_real_escape_string($connection, $value)."'";
}

function is_url_exist($url)
{
    $headers = get_headers($url);

    return stripos($headers[0], '200 OK') ? true : false;
}


function convertm3uurl($url,$type2)
{
    $var = fread_url($url);
  if ($type2 == 'hls') {
  //  $re = '/.*,\s*(.*)\n(http:\/\/.*\.m3u8)/';
    $re = '/(http:.*ng).*,\s*(.*)\n(http:\/\/.*\.m3u8)/';
  }
  else {
  //  $re = '/.*,\s*(.*)\n(.*)\n/';
    $re = '/(http:.*ng).*,\s*(.*)\n(.*)\n/';
  }
    preg_match_all($re, $var, $matches);
  //   echo '<pre>';  print_r ($matches);echo '</pre>';
  for ($i = 0; $i < count($matches[2]); $i++) {

    echo "<item>\r\n<title>".$matches[2][$i]."</title>\r\n<link>".$matches[3][$i]."</link>\r\n<thumbnail>".$matches[1][$i]."</thumbnail>\r\n</item>\r\n\r\n";
}
}

function convertm3u2xml($url,$type2)
{
  $var = fread_url($url);
    $re = '/(http:.*ng).*,\s*(.*)\n(.*)\n/';
    preg_match_all($re, $var, $matches);
  for ($i = 0; $i < count($matches[2]); $i++) {
    if ($type2 == 'hls') {
      if (strpos($matches[3][$i], 'rtmp') !== false) {
    //    echo $matches[3][$i].'<br />';
  //  echo'<a href="/upg_player.html?play='.$matches[3][$i].'&poster='.$matches[1][$i].'&type='.$matches[2][$i].'&channel='.$matches[2][$i].'"><li class="clearfix"><img width="70px" height="70px" src="'.$matches[1][$i].'" alt="'.$matches[2][$i].'" class="thumbnail"><h2>'.$matches[2][$i].'</h2><p class="desc">'.$matches[2][$i].'</p><span class="price">'.$matches[2][$i].'</span></li></a>';
  }
  else {
    echo '<a href="/upg_player.html?play='.$matches[3][$i].'&poster='.$matches[1][$i].'&type='.$matches[2][$i].'&channel='.$matches[2][$i].'"><li class="clearfix"><img width="70px" height="70px" src="'.$matches[1][$i].'" alt="'.$matches[2][$i].'" class="thumbnail"><h2>'.$matches[2][$i].'</h2><p class="desc">'.$matches[2][$i].'</p><span class="price">'.$matches[2][$i].'</span></li></a>';
  }
}
else
{
  echo'
  <a href="/upg_player.html?play='.$matches[3][$i].'&poster='.$matches[1][$i].'&type='.$matches[2][$i].'&channel='.$matches[2][$i].'">
  <li class="clearfix">
  <img width="70px" height="70px" src="'.$matches[1][$i].'" alt="'.$matches[2][$i].'" class="thumbnail">
  <h2>'.$matches[2][$i].'</h2>
  <p class="desc">'.$matches[2][$i].'</p>
  <span class="price">'.$matches[2][$i].'</span>
  </li>
  </a>';
}
//    echo "<item>\r\n<title>".$matches[2][$i]."</title>\r\n<link>".$matches[3][$i]."</link>\r\n<thumbnail>".$matches[1][$i]."</thumbnail>\r\n</item>\r\n\r\n";
}
}


function convertm3uurl2($url,$type2)
{
    $var = fread_url($url);
  if ($type2 == 'hls') {
  //  $re = '/.*,\s*(.*)\n(http:\/\/.*\.m3u8)/';
    $re = '/(http:.*ng).*,\s*(.*)\n(http:\/\/.*\.m3u8)/';
  }
  else {
  //  $re = '/.*,\s*(.*)\n(.*)\n/';
    $re = '/(http:.*ng).*,\s*(.*)\n(.*)\n/';
  }
    preg_match_all($re, $var, $matches);
  //   echo '<pre>';  print_r ($matches);echo '</pre>';
  for ($i = 0; $i < count($matches[2]); $i++) {

    echo "<item>\r\n<title>".$matches[2][$i]."</title>\r\n<link>".$matches[3][$i]."</link>\r\n<thumbnail>".$matches[1][$i]."</thumbnail>\r\n</item>\r\n\r\n";
}
}

function enterdb($url,$type2)
{
    $var = fread_url($url);
  if ($type2 == 'hls') {
    $re = '/.*,\s*(.*)\n(http:\/\/.*\.m3u8)/';
  }
  else {
    $re = '/.*,\s*(.*)\n(.*)\n/';
  }
    preg_match_all($re, $var, $matches);
  for ($i = 0; $i < count($matches[2]); $i++) {
//echo 'channel : '.$matches[1][$i].'<br />';
//echo 'url : '.$matches[2][$i].'<br />';
$chan = $matches[1][$i];
$uri = $matches[2][$i];
$chan = str_replace(" BUP 1","",$chan);
$chan = str_replace(" BUP 2","",$chan);
$chan = str_replace(" BUP 3","",$chan);
$chan = str_replace(" BUP 4","",$chan);
$chan = str_replace(" BUP 5","",$chan);
$chan = str_replace(" BUP 6","",$chan);
$chan = str_replace(" BUP","",$chan);
$chan = rtrim($chan);
//echo $chan.'<br />';
//echo $uri.'<br />';

db_connect();
$query ="select id, title from greekchannels WHERE title LIKE '$chan' LIMIT 1";
//echo $query.'<br />';
$result = db_query($query);
if ($result === false) {
    return false;
}
while ($row = mysqli_fetch_assoc($result)) {
  $upgchanid = $row['id'];
  $upgchantitle = $row['title'];
  echo $chan.' was matched to '.$upgchantitle.' with id of '.$upgchanid.'<br />';
  $sql2 = "INSERT IGNORE INTO streams (channelid,streamurl,streamformat,user) VALUES ('$upgchanid','$uri','$type2','robot')";
  $result2 = db_query($sql2);
  if ($result2 === false) {
      return false;
  }
//  echo $sql2.'<br />';
}



}
}


function converturl($url)
{
    $var = fread_url($url);
    preg_match_all("/a[\s]+[^>]*?href[\s]?=[\s\"\']+".
                  "(.*?)[\"\']+.*?>"."([^<]+|.*?)?<\/a>/",
                  $var, $matches);

    $matches = $matches[1];
    $list = array();
    foreach ($matches as $var) {
        $link = $url.$var;
        $dtitle = $var;
        $dtitle = str_replace('+', ' ', $dtitle);
        $dtitle = str_replace('.', ' ', $dtitle);
        $dtitle = str_replace(' TehMovies com ', '', $dtitle);
        $dtitle = str_replace('%5D', ']', $dtitle);
        $dtitle = str_replace('%5B', '[', $dtitle);
        $dtitle = str_replace('%28', '(', $dtitle);
        $dtitle = str_replace('%29', ')', $dtitle);
        $dtitle = str_replace('%26amp%3B', ' ', $dtitle);
        $dtitle = str_replace('%40', '@', $dtitle);
        $dtitle = str_replace('%2', '-', $dtitle);
        $dtitle = substr($dtitle, 0, -3);
        if ($dtitle != '') {
            echo  "<item>\r\n<title>".$dtitle."</title>\r\n<link>".$link."</link>\r\n<thumbnail></thumbnail>\r\n</item>\r\n\r\n";
        }
    //    echo '<a href="'.$sUrl.'" title="Download '.$dtitle.' via magnet link">'.$dtitle.'</a><br>';
    }
}

function fread_url($url, $ref = '')
{
    if (function_exists('curl_init')) {
        $ch = curl_init();
        $user_agent = 'Mozilla/5.0 (iPhone; CPU iPhone OS 5_0 like Mac OS X) AppleWebKit/534.46 (KHTML, like Gecko) Version/5.1 Mobile/9A334 Safari/7534.48.3';
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_ENCODING, 'gzip');
        curl_setopt($ch, CURLOPT_HTTPGET, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        if (!ini_get('safe_mode')) {
        }
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_REFERER, $ref);
        curl_setopt($ch, CURLOPT_COOKIEJAR, 'cookie.txt');
        $html = curl_exec($ch);
        curl_close($ch);
    } else {
        $hfile = fopen($url, 'r');
        if ($hfile) {
            while (!feof($hfile)) {
                $html .= fgets($hfile, 1024);
            }
        }
    }

    return $html;
}

function is_url_exist2($url)
{
    $handle = curl_init($url);
    curl_setopt($handle, CURLOPT_HEADER, true);
    curl_setopt($handle, CURLOPT_NOBODY, true);
    curl_setopt($handle, CURLOPT_USERAGENT, 'Mozilla/5.0 (iPhone; U; CPU like Mac OS X; en) AppleWebKit/420.1 (KHTML, like Gecko) Version/3.0 Mobile/3B48b Safari/419.3');
    curl_setopt($handle, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($handle, CURLOPT_TIMEOUT, 10);
    curl_setopt($handle, CURLOPT_ENCODING, 'gzip');
    curl_setopt($handle, CURLOPT_FOLLOWLOCATION, 1);
    $response = curl_exec($handle);
    $httpCode = curl_getinfo($handle, CURLINFO_HTTP_CODE);
    if ($httpCode == 200) {
        return true;
    } else {
        return false;
    }

    curl_close($handle);
}
