<?php
function loadcontent()
{
    $menuname_observed = isset($_GET['thepath']) ? $_GET['thepath'] : null;
    switch ($menuname_observed) {
    case 'login':
       include 'login_header.php';
       include 'login_content.php';
       include 'login_footer.php';
        break;

        case 'greekchannels':
           include 'greekchannels_header.php';
           include 'navbar.php';
           include 'greekchannels_content.php';
           include 'prefooter.php';
           include('footer.php');
           include 'greekchannels_footer.php';
            break;

            case 'streamurls':
               include 'streams_header.php';
               include 'navbar.php';
               include 'streams_content.php';
               include 'prefooter.php';
               include('footer.php');
               include 'streams_footer.php';
                break;
                case 'platformapi':
                   include 'platformapi_header.php';
                   include 'navbar.php';
                   include 'platformapi_content.php';
                   include 'prefooter.php';
                   include('footer.php');
                   include 'platformapi_footer.php';
                    break;

    default:
        include 'blank.php';
}
}
 ?>
