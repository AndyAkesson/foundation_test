<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Andyweb Testing Foundation</title>
    <link rel="stylesheet" href="stylesheets/app.css" />
    <script src="bower_components/jquery/dist/jquery.min.js"></script>
    <script src="bower_components/modernizr/modernizr.js"></script>
    <script src="http://malsup.github.com/jquery.form.js"></script>
    <script src="js/jquery.validate.min.js"></script>
    <?php
       // Report all PHP errors (see changelog)
      error_reporting(E_ALL);
    ?>

  </head>
  <body>

  <nav class="top-bar" data-topbar role="navigation">
    <ul class="title-area">
      <li class="name">
        <h1><a href="#">My Site</a></h1>
      </li>
       <!-- Remove the class "menu-icon" to get rid of menu icon. Take out "Menu" to just have icon alone -->
      <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
    </ul>

    <section class="top-bar-section">
      <!-- Right Nav Section -->
      <ul class="right">
        <li class="active"><a href="#">Right Button Active</a></li>
        <li class="has-dropdown">
          <a href="#">Right Button Dropdown</a>
          <ul class="dropdown">
            <li><a href="#">First link in dropdown</a></li>
            <li class="active"><a href="#">Active link in dropdown</a></li>
          </ul>
        </li>
      </ul>

      <!-- Left Nav Section -->
      <ul class="left">
        <li><a href="#">Back to Andyweb</a></li>
        <li><a href="#">Left Nav Button</a></li>
      </ul>
    </section>
  </nav>

  <div class="magellan" data-magellan-expedition="fixed">
    <dl class="sub-nav">
      <dd data-magellan-arrival="php-form"><a href="#first-panel">Form Validation Example</a></dd>
      <dd data-magellan-arrival="first-panel"><a href="#first-panel">First panel</a></dd>
      <dd data-magellan-arrival="first-normal-div"><a href="#first-normal-div">First normal div</a></dd>
      <dd data-magellan-arrival="build"><a href="#build">Build with HTML</a></dd>
      <dd data-magellan-arrival="columns"><a href="#columns">Columns</a></dd>
      <dd data-magellan-arrival="arrival-one"><a href="#magellan-arrival-one">Arrival 1</a>
      <dd data-magellan-arrival="form"><a href="#form">Forms</a></dd>
      <dd data-magellan-arrival="arrival-two"><a href="#magellan-arrival-two">Arrival 2</a></dd>
    </dl>
  </div>

    <div class="row">
      <div class="large-12 columns">
        <h1>Andyweb Testing Foundation</h1>
      </div>
    </div>

    <?php
      // define variables and set to empty values 
      $nameErr = "Name is required and must be a string.";
      $emailErr = "An email address is required.";
      $name = $email = $comment = $gender = "";

      if ($_SERVER["REQUEST_METHOD"] == "POST") {
         if (empty($_POST["name"])) {
           $nameErr = "Name is required";
         } else {
           $name = test_input($_POST["name"]);
           // check if name only contains letters and whitespace
           if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
             $nameErr = "Only letters and white space allowed"; 
           }
         }
         
         if (empty($_POST["email"])) {
           $emailErr = "Email is required";
         } else {
           $email = test_input($_POST["email"]);
           // check if e-mail address is well-formed
           if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
             $emailErr = "Invalid email format"; 
           }
         }

        if (empty($_POST["gender"])) {
           $gender = "";
         } else {
           $gender = test_input($_POST["gender"]);
         }

         if (empty($_POST["comment"])) {
           $comment = "";
         } else {
           $comment = test_input($_POST["comment"]);
         }
      }

      function test_input($data) {
         $data = trim($data);
         $data = stripslashes($data);
         $data = htmlspecialchars($data);
         return $data;
      }
      
      ?> 

      <div class="row" id="php-form">
        <div class="12-large columns">
          <h2 data-magellan-destination="php-form">Form Validation Example</h2>
          <form data-abide id="myForm" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
                <fieldset>
                  <legend>Please provide your name, email address (won't be published) and a comment</legend>
                  <p>
                    <label for="cname">Name (required, at least 2 characters)</label>
                    <input id="cname" name="name" minlength="2" type="text" placeholder="John Doe" required>
                  </p>
                  <p>
                    <label for="cemail">E-Mail (required)</label>
                    <input id="cemail" type="email" name="email" placeholder="email@mail.com" required>
                  </p>
                  <p>
                    <label for="curl">URL (optional)</label>
                    <input id="curl" type="url" name="url" placeholder="http://www.website.com">
                  </p>
                  <p>
                    <label for="gender">Gender</label>
                    <select id="gender" name="gender" title="Please select your gender" required>
                      <option value="" selected="selected"></option>
                      <option value="Male">Male</option>
                      <option value="Female">Female</option>
                      <option value="Trans">Trans</option>
                    </select>
                  </p>
                  <p>
                    <label for="ccomment">Your comment (required)</label>
                    <textarea id="ccomment" name="comment" required></textarea>
                  </p>
                  <p>
                    <button class="submit" type="submit" value="Submit">Submit</button>
                  </p>
                </fieldset>
          </form>

          <div class="panel">
            <a href="#" data-reveal-id="myModal">See your input</a>
          </div>

          <div id="myModal" class="reveal-modal" data-reveal>
            <h2>Awesome. I have it.</h2>
            <p class="lead">Your Input:</p>
            <p>          
              <?php
                echo $name;
                echo "<br>";
                echo $email;
                echo "<br>";
                echo $gender;
                echo "<br>";
                echo $comment;
              ?>
            </p>
            <a class="close-reveal-modal">&#215;</a>
          </div>
        </div>
      </div>

    <div class="row" id="first-panel">
      <div class="large-12 columns">
        <div class="panel">
          <h3 data-magellan-destination="first-panel">First Panel</h3>
          <p>Lorem ipsum dolor sit amet, esse nostro senserit est te, ex pro quando periculis urbanitas. Quod vide omnium no sit, usu te possim nominavi appareat. Vis at malis doctus delectus, partem fastidii in vis, sed nemore nusquam ne. Legere habemus consequuntur cu has. Per invidunt lucilius te. Qui ex oblique impedit qualisque. Et mea affert vivendum postulant.

          Mel mundi expetendis ex. Mediocrem maiestatis mediocritatem eos cu, eam eu nullam patrioque intellegam, duo id hinc feugiat honestatis. Ad sea assueverit dissentias, id mel nostro timeam. Vim no bonorum sensibus aliquando, in mea primis deleniti. Velit facete verterem ut eam, sea eius facer maiestatis an. Atqui gubergren ad ius, apeirian vituperatoribus eos ea.

          Est eu elitr pertinacia, id mel causae accusamus dissentiet. Modo dolore doctus vim ea. Has tempor eloquentiam eu, ea suscipit senserit qualisque duo. Eos diam accommodare ne, feugait luptatum petentium per id. Sea ea eripuit mediocrem.

          Ex eos albucius interesset necessitatibus, probo equidem mea te. Ex case expetenda consequuntur sed, movet appareat vim id. Id per diam dicam dicant. Ius magna mandamus complectitur in, ne aliquam quaerendum ius. At velit phaedrum eam, mea eu nisl wisi cotidieque.

          Purto cotidieque has et, has ex zril instructior, ei has quem malis. Ex ipsum graece verear pri, usu causae numquam graecis ex. Ipsum liber et qui, nam ad etiam utroque atomorum. Eum at elitr oblique nominati.</p>
        </div>
      </div>
    </div>

    <div class="row" id="first-normal-div">
      <div class="large-12 columns">
        <h3 data-magellan-destination="first-normal-div">First Normal Div</h3>
        <p>Lorem ipsum dolor sit amet, esse nostro senserit est te, ex pro quando periculis urbanitas. Quod vide omnium no sit, usu te possim nominavi appareat. Vis at malis doctus delectus, partem fastidii in vis, sed nemore nusquam ne. Legere habemus consequuntur cu has. Per invidunt lucilius te. Qui ex oblique impedit qualisque. Et mea affert vivendum postulant.

        Mel mundi expetendis ex. Mediocrem maiestatis mediocritatem eos cu, eam eu nullam patrioque intellegam, duo id hinc feugiat honestatis. Ad sea assueverit dissentias, id mel nostro timeam. Vim no bonorum sensibus aliquando, in mea primis deleniti. Velit facete verterem ut eam, sea eius facer maiestatis an. Atqui gubergren ad ius, apeirian vituperatoribus eos ea.

        Est eu elitr pertinacia, id mel causae accusamus dissentiet. Modo dolore doctus vim ea. Has tempor eloquentiam eu, ea suscipit senserit qualisque duo. Eos diam accommodare ne, feugait luptatum petentium per id. Sea ea eripuit mediocrem.

        Ex eos albucius interesset necessitatibus, probo equidem mea te. Ex case expetenda consequuntur sed, movet appareat vim id. Id per diam dicam dicant. Ius magna mandamus complectitur in, ne aliquam quaerendum ius. At velit phaedrum eam, mea eu nisl wisi cotidieque.

        Purto cotidieque has et, has ex zril instructior, ei has quem malis. Ex ipsum graece verear pri, usu causae numquam graecis ex. Ipsum liber et qui, nam ad etiam utroque atomorum. Eum at elitr oblique nominati.</p>
      </div>
    </div>
    
    <div class="row" id="build">
      <div class="large-12 columns">
        <div class="panel">
          <h3 data-magellan-destination="build">Build Stuff</h3>
          <h3>We&rsquo;re stoked you want to try Foundation! </h3>
          <p>To get going, this file (index.html) includes some basic styles you can modify, play around with, or totally destroy to get going.</p>
          <p>Once you've exhausted the fun in this document, you should check out:</p>
          <div class="row">
            <div class="large-4 medium-4 columns">
          <p><a href="http://foundation.zurb.com/docs">Foundation Documentation</a><br />Everything you need to know about using the framework.</p>
        </div>
            <div class="large-4 medium-4 columns">
              <p><a href="http://github.com/zurb/foundation">Foundation on Github</a><br />Latest code, issue reports, feature requests and more.</p>
            </div>
            <div class="large-4 medium-4 columns">
              <p><a href="http://twitter.com/foundationzurb">@foundationzurb</a><br />Ping us on Twitter if you have questions. If you build something with this we'd love to see it (and send you a totally boss sticker).</p>
            </div>        
          </div>
        </div>
      </div>
    </div>

    <div class="row" id="columns">
      <div class="large-8 medium-8 columns">
        <h3 data-magellan-destination="columns">Columns</h3>
        <h5>Here&rsquo;s your basic grid:</h5>
        <!-- Grid Example -->

        <div class="row">
          <div class="large-12 columns">
            <div class="callout panel">
              <p><strong>This is a twelve column section in a row.</strong> Each of these includes a div.panel element so you can see where the columns are - it's not required at all for the grid.</p>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="large-6 medium-6 columns">
            <div class="callout panel">
              <p>Lorem ipsum dolor sit amet, esse nostro senserit est te, ex pro quando periculis urbanitas. Quod vide omnium no sit, usu te possim nominavi appareat. Vis at malis doctus delectus, partem fastidii in vis, sed nemore nusquam ne. Legere habemus consequuntur cu has. Per invidunt lucilius te. Qui ex oblique impedit qualisque. Et mea affert vivendum postulant.</p>
            </div>
          </div>
          <div class="large-6 medium-6 columns">
            <div class="callout panel">
              <p>Mel mundi expetendis ex. Mediocrem maiestatis mediocritatem eos cu, eam eu nullam patrioque intellegam, duo id hinc feugiat honestatis. Ad sea assueverit dissentias, id mel nostro timeam. Vim no bonorum sensibus aliquando, in mea primis deleniti. Velit facete verterem ut eam, sea eius facer maiestatis an. Atqui gubergren ad ius, apeirian vituperatoribus eos ea.</p>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="large-4 medium-4 small-4 columns">
            <div class="callout panel">
              <p>Est eu elitr pertinacia, id mel causae accusamus dissentiet. Modo dolore doctus vim ea. Has tempor eloquentiam eu, ea suscipit senserit qualisque duo. Eos diam accommodare ne, feugait luptatum petentium per id. Sea ea eripuit mediocrem.</p>
            </div>
          </div>
          <div class="large-4 medium-4 small-4 columns">
            <div class="callout panel">
              <p>Ex eos albucius interesset necessitatibus, probo equidem mea te. Ex case expetenda consequuntur sed, movet appareat vim id. Id per diam dicam dicant. Ius magna mandamus complectitur in, ne aliquam quaerendum ius. At velit phaedrum eam, mea eu nisl wisi cotidieque.</p>
            </div>
          </div>
          <div class="large-4 medium-4 small-4 columns">
            <div class="callout panel">
              <p>Purto cotidieque has et, has ex zril instructior, ei has quem malis. Ex ipsum graece verear pri, usu causae numquam graecis ex. Ipsum liber et qui, nam ad etiam utroque atomorum. Eum at elitr oblique nominati.</p>
            </div>
          </div>
        </div>

        <hr />

      <div class="row">
        <div id="magellan-arrival-one">
          <h3 data-magellan-destination="arrival-one">Arrival One</h3>
          <div class="large-12 columns">
            <p>Lorem ipsum dolor sit amet, esse nostro senserit est te, ex pro quando periculis urbanitas. Quod vide omnium no sit, usu te possim nominavi appareat. Vis at malis doctus delectus, partem fastidii in vis, sed nemore nusquam ne. Legere habemus consequuntur cu has. Per invidunt lucilius te. Qui ex oblique impedit qualisque. Et mea affert vivendum postulant.

            Mel mundi expetendis ex. Mediocrem maiestatis mediocritatem eos cu, eam eu nullam patrioque intellegam, duo id hinc feugiat honestatis. Ad sea assueverit dissentias, id mel nostro timeam. Vim no bonorum sensibus aliquando, in mea primis deleniti. Velit facete verterem ut eam, sea eius facer maiestatis an. Atqui gubergren ad ius, apeirian vituperatoribus eos ea.

            Est eu elitr pertinacia, id mel causae accusamus dissentiet. Modo dolore doctus vim ea. Has tempor eloquentiam eu, ea suscipit senserit qualisque duo. Eos diam accommodare ne, feugait luptatum petentium per id. Sea ea eripuit mediocrem.

            Ex eos albucius interesset necessitatibus, probo equidem mea te. Ex case expetenda consequuntur sed, movet appareat vim id. Id per diam dicam dicant. Ius magna mandamus complectitur in, ne aliquam quaerendum ius. At velit phaedrum eam, mea eu nisl wisi cotidieque.

            Purto cotidieque has et, has ex zril instructior, ei has quem malis. Ex ipsum graece verear pri, usu causae numquam graecis ex. Ipsum liber et qui, nam ad etiam utroque atomorum. Eum at elitr oblique nominati.</p>
          </div>
        </div>
      </div>
        
        <hr />
                
        <h5>We bet you&rsquo;ll need a form somewhere:</h5>

        <form>
          <fieldset>
              <legend data-magellan-destination="form">Fieldset Legend</legend>

              <label>Input Label
                <input type="text" placeholder="Inputs and other form elements go inside...">
              </label>

            <div class="row">
              <div class="large-12 columns">
                <label>Input Label</label>
                <input type="text" placeholder="large-12.columns" />
              </div>
            </div>
            <div class="row">
              <div class="large-4 medium-4 columns">
                <label>Input Label</label>
                <input type="text" placeholder="large-4.columns" />
              </div>
              <div class="large-4 medium-4 columns">
                <label>Input Label</label>
                <input type="text" placeholder="large-4.columns" />
              </div>
              <div class="large-4 medium-4 columns">
                <div class="row collapse">
                  <label>Input Label</label>
                  <div class="small-9 columns">
                    <input type="text" placeholder="small-9.columns" />
                  </div>
                  <div class="small-3 columns">
                    <span class="postfix">.com</span>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="large-12 columns">
                <label>Select Box</label>
                <select>
                  <option value="husker">Husker</option>
                  <option value="starbuck">Starbuck</option>
                  <option value="hotdog">Hot Dog</option>
                  <option value="apollo">Apollo</option>
                </select>
              </div>
            </div>
            <div class="row">
              <div class="large-6 medium-6 columns">
                <label>Choose Your Favorite</label>
                <input type="radio" name="pokemon" value="Red" id="pokemonRed"><label for="pokemonRed">Radio 1</label>
                <input type="radio" name="pokemon" value="Blue" id="pokemonBlue"><label for="pokemonBlue">Radio 2</label>
              </div>
              <div class="large-6 medium-6 columns">
                <label>Check these out</label>
                <input id="checkbox1" type="checkbox"><label for="checkbox1">Checkbox 1</label>
                <input id="checkbox2" type="checkbox"><label for="checkbox2">Checkbox 2</label>
              </div>
            </div>
            <div class="row">
              <div class="large-12 columns">
                <label>Textarea Label</label>
                <textarea placeholder="small-12.columns"></textarea>
              </div>
            </div>
          </form>
        </div>   

      </fieldset>
    </form>  

      <div class="large-4 medium-4 columns">
        <h5>Try one of these buttons:</h5>
        <p><a href="#" class="small button">Simple Button</a><br/>
        <a href="#" class="small radius button">Radius Button</a><br/>
        <a href="#" class="small round button">Round Button</a><br/>            
        <a href="#" class="medium success button">Success Btn</a><br/>
        <a href="#" class="medium alert button">Alert Btn</a><br/>
        <a href="#" class="medium secondary button">Secondary Btn</a></p>           
        <div class="panel">
          <h5>So many components, girl!</h5>
          <p>A whole kitchen sink of goodies comes with Foundation. Check out the docs to see them all, along with details on making them your own.</p>
          <a href="http://foundation.zurb.com/docs/" class="small button">Go to Foundation Docs</a>          
        </div>
      </div>
    </div>

      <div class="row">
        <div id="magellan-arrival-two">
          <h3 data-magellan-destination="arrival-two">Arrival Two</h3>
          <div class="large-12 columns">
            <p>Lorem ipsum dolor sit amet, esse nostro senserit est te, ex pro quando periculis urbanitas. Quod vide omnium no sit, usu te possim nominavi appareat. Vis at malis doctus delectus, partem fastidii in vis, sed nemore nusquam ne. Legere habemus consequuntur cu has. Per invidunt lucilius te. Qui ex oblique impedit qualisque. Et mea affert vivendum postulant.

            Mel mundi expetendis ex. Mediocrem maiestatis mediocritatem eos cu, eam eu nullam patrioque intellegam, duo id hinc feugiat honestatis. Ad sea assueverit dissentias, id mel nostro timeam. Vim no bonorum sensibus aliquando, in mea primis deleniti. Velit facete verterem ut eam, sea eius facer maiestatis an. Atqui gubergren ad ius, apeirian vituperatoribus eos ea.

            Est eu elitr pertinacia, id mel causae accusamus dissentiet. Modo dolore doctus vim ea. Has tempor eloquentiam eu, ea suscipit senserit qualisque duo. Eos diam accommodare ne, feugait luptatum petentium per id. Sea ea eripuit mediocrem.

            Ex eos albucius interesset necessitatibus, probo equidem mea te. Ex case expetenda consequuntur sed, movet appareat vim id. Id per diam dicam dicant. Ius magna mandamus complectitur in, ne aliquam quaerendum ius. At velit phaedrum eam, mea eu nisl wisi cotidieque.

            Purto cotidieque has et, has ex zril instructior, ei has quem malis. Ex ipsum graece verear pri, usu causae numquam graecis ex. Ipsum liber et qui, nam ad etiam utroque atomorum. Eum at elitr oblique nominati.</p>
          </div>
        </div>
      </div>

      <div class="row"> 
        <table>
          <thead>
            <tr>
              <th width="200">Table Header</th>
              <th>Table Header</th>
              <th width="150">Table Header</th>
              <th width="150">Table Header</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Content Goes Here</td>
              <td>This is longer content Donec id elit non mi porta gravida at eget metus.</td>
              <td>Content Goes Here</td>
              <td>Content Goes Here</td>
            </tr>
            <tr>
              <td>Content Goes Here</td>
              <td>This is longer Content Goes Here Donec id elit non mi porta gravida at eget metus.</td>
              <td>Content Goes Here</td>
              <td>Content Goes Here</td>
            </tr>
            <tr>
              <td>Content Goes Here</td>
              <td>This is longer Content Goes Here Donec id elit non mi porta gravida at eget metus.</td>
              <td>Content Goes Here</td>
              <td>Content Goes Here</td>
            </tr>
          </tbody>
        </table>
      </div>

    <script src="bower_components/foundation/js/foundation.min.js"></script>
    <script src="bower_components/foundation/js/foundation/foundation.magellan.js"></script>
    <script src="js/app.js"></script>
  </body>
</html>
