<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="description" content="About section of the website" />
  <meta name="author" content="Edeser III Monserrate" />
  <meta name="keywords" content="about, personal details" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Exotic Customs - About</title>
  <link href= "styles/style.css" rel="stylesheet" />
</head>
<body>
  <section class="container">
   <div id="header">
    <?php include_once "includes/header.inc"; ?>
      <div id="nav_bar">
        <nav>
          <?php include_once "includes/nav.inc"; ?>
        </nav>
      </div>
    </div>
  </section>

  <section class="content_area">
    <div id="banner_about">
      </div>
  </section>

  <div class="body_section">
    <aside id="sidebar_about">
      <div class="adspace_about">
        <p class="adspace"> adspace </p>
      </div>
      <div class="adspace_about">
        <p class="adspace"> adspace </p>
      </div>
      <div class="adspace_about">
        <p class="adspace"> adspace </p>
      </div>
    </aside>

    <fieldset>
      <legend>Description</legend>
      <p id="student_id">Student ID = 102347754</p>
      <h1 class="def_title">Edeser III Monserrate</h1>

        <img src="Images/eddie.m.jpg" alt="" id="personal_img"/>

      <h2 class="def_title">Timetable</h2>
        <table id="timetable">
          <thead>
          <tr>
            <th>Time</th>
            <th>Monday</th>
            <th>Tuesday</th>
            <th>Wednesday</th>
            <th>Thursday</th>
            <th>Friday</th>
          </tr>
          </thead>
          <tbody>
            <tr>
              <td>8:30am-10:30am</td>
              <td>N/A</td>
              <td>COS10009 Lecture</td>
              <td>TNE10006 Lab</td>
              <td>N/A</td>
              <td>N/A</td>
            </tr>
            <tr>
              <td>10:30am - 12:30pm</td>
              <td>N/A</td>
              <td>COS10011 Lecture</td>
              <td>TNE10006 Lab</td>
              <td>N/A</td>
              <td>COS10009 Lab</td>
            </tr>
            <tr>
              <td>12:30pm - 2:30pm</td>
              <td>TNE10006 Lecture</td>
              <td>N/A</td>
              <td>COS10011 Lab</td>
              <td>N/A</td>
              <td>COS10003 Tutorial</td>
            </tr>
            <tr>
              <td>2:30pm - 4:30pm</td>
              <td>N/A</td>
              <td>N/A</td>
              <td>N/A</td>
              <td>N/A</td>
              <td>N/A</td>
            </tr>
            <tr>
              <td>4:30pm - 6:30pm</td>
              <td>N/A</td>
              <td>N/A</td>
              <td>COS10003 Lecture</td>
              <td>N/A</td>
              <td>N/A</td>
            </tr>
          </tbody>
        </table>

      <dl>
        <dt>My Hobbies/Interests</dt>
        <dd>Video Games</dd>
        <dd>Cars</dd>
        <dd>Music</dd>
        <dd>Watching Youtube</dd>
        <dd>Cooking</dd>
      </dl>

      </fieldset>

    <fieldset>
      <legend>Assignment Requirements</legend>
      <article id="assignment_nav">
      <ol>
        <li class="assignment_req"><a href="Exotic_Customs_Index.html"></a></li>
        <li class="assignment_req"><a href="Exotic_Customs_Products.html">Products</a></li>
        <li class="assignment_req"><a href="Exotic_Customs_Enquiries.html">Enquiries</a></li>
        <li class="assignment_req"><a href="Exotic_Customs_About.html">About</a></li>
        <li class="assignment_req"><a href="styles/Alt_css.css">CSS Stylesheet</a></li>
      </ol>
    </article>
      <h2 id="h2_about">Reflection</h2>
      <section>
        <p class="reflection"> The creating of this website has taught me a lot of things
          about incorporating HTML and CSS to make a proper website.
          It taught me the importance of having structured code to make sure
          each section doesn't overlap with each other and at the
          same time to </p>
        <p class="reflection"> Furthermore, the different challenges i faced in making my first
          proper website has given me an insight on the time and effort it requires
          to maintain and build a fully functional website. I would have liked to use Javascript
          to add a few features that would make the website more refined however it was a good learning
          experience having the restriction of just CSS and HTML.</p>
      </section>
    </fieldset>

  <footer>
  <a href="mailto:102347754@student.swin.edu.au">
    Email: 102347754@student.swin.edu.au </a>
  </footer>
</div>

</body>
</html>
