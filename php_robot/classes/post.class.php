<?php

class telegramPostBuilder
{
  /*
    Being Thankful Towards Knowledge is to share it ...
    -Imam Ali
    coded by: Kazem
    https://github.com/kaz3m/zakat_elm_robot
  */
  public $footerTextSalavat;
  public $footerTextHadith;
  public $footerTextSimple;
  public $maintenanceMsg;
  public $startPostContent;
  public $viewListContent;
  public $DBConn;
  public $viewReminderContent;
  public $estekhareStepsText;
  public function __construct()
  {

    $this->footerTextSalavat = "

    🌹___---::: سبحان الله :::---___ 🌹
    🌃 اللَّهُمَّ صَلِّ عَلَى مُحَمَّدٍ وآلِ مُحَمَّدٍ وعَجِّلْ فَرَجَهُمْ وسَهِّلْ مَخْرَجَهُمْ والعَنْ أعْدَاءَهُم
    📖 @zakat_elm_robot | زکات علم";

    $this->footerTextSimple = "

    📖 @zakat_elm_robot | زکات علم";

    $this->startPostContent = "🤖 سلام:
به ربات زکات علم خوش آمدید

✅ مجموعه ویدیو های آموزشی 
✅ آموزش ساخت ربات تلگرام
✅ آموزش استفاده از بیت کوین
و...
•┈┈••✾ ☘ 🕊🕊🕊 ☘ ✾••┈┈• 

#moshtarak_shavid 

__..::📽🎞 کانال ما در یوتیوب 👇👇::..__

https://www.youtube.com/channel/UClyMb3gVs_X01jJoDhrChPw/about

__..::📽🎞 کانال ما در آپارات 👇👇::..__

https://www.aparat.com/zakate_elm_nashr

•┈┈••✾ ☘ 🕊🕊🕊 ☘ ✾••┈┈•

";
  }


  public function buildPost($content, $footer='salavat')
  {
    if (!empty($content))
    {
      
      switch ($footer) {

        case 'salavat':
          $postContent = $content . PHP_EOL . $this->footerTextSalavat;
          return $postContent;
          break;

          
        default:
          // code...
          break;
      }
    }

  }

  public function buildTodayPost()
  {
    $dateStringYear  = jdate("Y");
    $dateStringMonth  = jdate("F");
    $dateStringDayName  = jdate("l");
    $dateStringDayNumber  = jdate("J");
    $todayString = "✅امروز ";
    $todayString .= PHP_EOL . $dateStringDayName . ' ' . $dateStringDayNumber . ' ' .  $dateStringMonth . ' ' . $dateStringYear;
    $todayString .= PHP_EOL . date("Y/m/d");
    $dt = new DateTime();
    $dt->setTimezone(new DateTimeZone('Asia/Tehran'));
    $dt->setTimestamp(time());
    $today = $dt->format('D');
    switch ($today) {
      case 'Sat':
        $todayZekr = 'یا رَبِّ الْعالَمِین "ای پروردگار جهانیان"';
        $todayZekr.= PHP_EOL .'•┈┈••✾☘🕊🕊🕊☘✾••┈┈•'.PHP_EOL  . "شنبه شروع هفته خدا یادم نرفته
خالق این جهانه خدای آسمانه
ذکر لبم همینه یا رب العالمینه";
        break;

      case 'Sun':
      $todayZekr = ' یا ذَالجَلالِ وَ اْلاِکْرام "ای صاحب جلال و بزرگواری"';
      $todayZekr .= PHP_EOL .'•┈┈••✾☘🕊🕊🕊☘✾••┈┈•'.PHP_EOL  . "یکشنبه یادت باشه خدا با بنده هاشه
بازم دلت رو شاد کن بخشندگی­شو یادکن
بگو همین رو والسلام یاذالجلال و الاکرام";
        break;
      case 'Mon':
        $todayZekr = 'یا قاضیَ الحاجات "ای برآورنده حاجت ها"';
        $todayZekr .= PHP_EOL .'•┈┈••✾☘🕊🕊🕊☘✾••┈┈•'.PHP_EOL  . "بعد از روز یکشنبه رسید روز دوشنبه
ازته دل میخونم خدای مهربونم
تو قلبای ما جاته یاقاضی الحاجاته";
        break;
      case 'Tue':
        $todayZekr = 'یا أَرْحَمَ الرَّاحِمِین "ای مهربان ترین مهربانان"';
        $todayZekr .= PHP_EOL .'•┈┈••✾☘🕊🕊🕊☘✾••┈┈•'.PHP_EOL  . "سه شنبه هم یه روزه نذار دلت بسوزه
بازم خدا خدا کن نعمتاشو نگا کن
بگو فقط تو همین یا ارحم الراحمین";
        break;
      case 'Wed':
        $todayZekr = 'یا حَیُّ یا قَیّومُ "ای زنده، ای پاینده"';
        $todayZekr .= PHP_EOL .'•┈┈••✾☘🕊🕊🕊☘✾••┈┈•'.PHP_EOL  . "توی تموم روزها مثل چهار شنبه ها
خدا رو می­شه یاد کرد شادی­ها رو زیاد کرد
ذکر خدا معلومه یاحی و یا قیومه";
        break;
      case 'Thu':
        $todayZekr = 'لا إِلهَ إِلَّا اللَّهُ المَلِک الحقّ المُبین "نیست خدایی جز الله فرمانروای حق و آشکار"';
        $todayZekr .= PHP_EOL .'•┈┈••✾☘🕊🕊🕊☘✾••┈┈•'.PHP_EOL . "هست ذکر پنج شنبه ها شکوه و لطف خدا
لا اله الا الله خدایی نیست جز الله ملک الحق المبین لطفهای او را ببین";
        break;
      case 'Fri':
        $todayZekr = 'الّلهُمَّ صَلِّ عَلَی مُحَمَّدٍ وَآلِ مُحَمَّدٍ و عجل فرجهم "خدایا بر محمد و آل محمد درود فرست و در فرج ایشان (حضرت مهدی) تعجیل فرما"';
        $todayZekr .= PHP_EOL .'•┈┈••✾☘🕊🕊🕊☘✾••┈┈•'.PHP_EOL  . "جمعه ها با صلوات تو می­رسی به حاجات
دعا دعا دعا کن خدا رو تو صدا کن
خدا ظهور آقا نزدیکتر بفرما
اللهم صل علی محمد و آل محمد";
        break;
    } // ======END SWITCH

    $postContent = $todayString . PHP_EOL . "ذکر امروز ( حداقل ۱۰۰ مرتبه ) 📿👇 ". PHP_EOL . $todayZekr . PHP_EOL;
    return $this->buildPost($postContent, 'salavat');

  }

  public function getImage($count = 1, $id='random', $tag = 'autumn', $category='wallpaper')
  {
    $this->DBConn = new DBConnection();
    $selectQS = "SELECT url,tags FROM public.images WHERE category='".$category."' 
    ORDER BY random() LIMIT '".$count."'";
    $q = $this->DBConn->runQuery($selectQS);
    $row = pg_fetch_assoc($q);
    return $row['url'];
  }
  public function returnTutorialReminder() 
  {
    $selectQS = "SELECT url FROM public.images WHERE category='tutorial' AND tags='reminder'";
    $this->DBConn = new DBConnection();
    $res = $this->DBConn->runQuery($selectQS);
    $row = pg_fetch_assoc($res);
    return explode(",", $row['url']);
  }
  public function getContent($title_eng) 
  {
    $selectQS = "SELECT * FROM public.content WHERE title_eng='".$title_eng."'";
    $this->DBConn = new DBConnection();
    $num_rows = $this->DBConn->returnNumRows(str_replace("SELECT *", "SELECT id", $selectQS));
    if ($num_rows == 1) 
    {
      $res = $this->DBConn->runQuery($selectQS);
      $row = pg_fetch_assoc($res);
      return $row;
    }
  }



} // =================== END CLASS =================== \\

