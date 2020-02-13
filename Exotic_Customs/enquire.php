<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="description" content="enquiry page of the website" />
    <meta name="author" content="Edeser III Monserrate, 102347754" />
    <meta name="keywords" content="enquiry, form, car purchase" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Exotic Customs - Enquiries</title>
    <link href= "styles/style.css" rel="stylesheet" />
    <script src= "scripts/part2.js"></script>
  </head>
  <body id ="enqpage">

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
  <div id="banner">
    <?php include_once "includes/banner1.inc"; ?>
  </div>
</section>

<section>
  <aside id="sidebar_enq">
    <div class= "options_enq">
      <h3>Options you can add to your car...</h3>
      <ol>
        <li>Transmission selection
          <ul>
            <li>Automatic - +$1000</li>
            <li>Manual - +$550</li>
          </ul>
        </li>
        <li>Modifications
          <ul>
            <li>Spoilers - $500</li>
            <li>Aftermarket Alloy Selection - $1000</li>
            <li>Tuning - Price will vary based off the type of service</li>
          </ul>
        </li> 
      </ol>
    </div>
    <div class= "options_enq">
      <h3>Further things to keep in mind</h3> 
      <ul>
        <li>Import location - Varies based off the import law of your state</li>
        <li>Registration - Starts at $500 with out premium car club, can also source an insurance which will provide the extra cost via their institution.</li>
      </ul>
    </div>
  </aside>

<form id="enquiryform" method="post" action="payment.php" novalidate="novalidate" >  <!---action="https://mercury.swin.edu.au/cos10011/s102347754/assign2/payment.html"-->
  <fieldset>
    <legend>Purchase Details</legend>
      <span><label for="givenname">Given Name: </label>
        <input type="text" name="givenname" id="givenname"
        maxlength="25" placeholder="e.g John" />
      </span>
      <span><label for="familyname">Family Name: </label>
        <input type="text" name="familyname" id="familyname"
        maxlength="25" placeholder="e.g Smith" />
      </span>

      <p><label for="email">Email Address: </label>
        <input type="text" name="email" id="email" placeholder="e.g someone@outlook.com" />
      </p>

      <p><label for="phone">Phone Number: </label>
        <input type="tel" name="phone" id="phone" placeholder="0987-654-321" />
      </p>
    
    <div id="contactpref">
      <span><label for="e_mail">E-Mail </label>
        <input type="checkbox" name="contactpref" id="e_mail" value="E-Mail" />
      </span>
      <span><label for="post_mail">Post/Mail </label>
        <input type="checkbox" name="contactpref" id="post_mail" value="Post Mail" />
      </span>
      <span>
        <label for="mobile">Mobile Phone</label>
        <input type="checkbox" name="contactpref" id="mobile" value="Mobile" />
      </span>
    </div>

  </fieldset>
  
  <fieldset>
    <legend>Address</legend>
    <span><label for="street_address">Street Address</label>
      <input type="text" name="street_address" id="street_address"
      placeholder="e.g 123 Station St" maxlength="40" />
    </span>
    <span><label for="suburb">Suburb</label>
      <input type="text" name="suburb" id="suburb" placeholder="e.g St Kilda" />
    </span>

    <p>
      <label for="state">State: </label>
      <select name="state" id="state">
        <option value="">Please Select...</option>
        <option value="VIC" name="VIC" id="VIC">Victoria</option>
        <option value="NSW" name="NSW" id="NSW">New South Wales</option>
        <option value="QLD" name="QLD" id="QLD">Queensland</option>
        <option value="NT" name="NT" id="NT">Northern Territory</option>
        <option value="WA" name="WA" id="WA">Western Australia</option>
        <option value="SA" name="SA" id="SA">South Australia</option>
      </select>
    </p>

    <p>
      <label for="postcode">Postcode: </label>
      <input type="text" name="postcode" id="postcode" maxlength="4" />
    </p>
  </fieldset>

  <fieldset>
    <legend>Your Car Selection</legend>
    
      <p><label for="Selection_J">JDM</label>
        <select id="Selection_J" name="Selection_J">
          <option value="...">Please Select...</option>
          <option value="Toyota Supra" name="Toyota Supra" id="Toyota_Supra">Toyota Supra</option>
          <option value="Nissan Skyline" name="Nissan Skyline" id="Nissan_Skyline">Nissan Skyline</option>
          <option value="Mazda RX7" name="Mazda RX7" id="Mazda_RX7">Mazda RX7</option>
          <option value="Nissan Silvia" name="Nissan Silvia" id="Nissan_Silvia">Nissan Silvia</option>
          <option value="Honda S2000" name="Honda S2000" id="Honda_S2000">Honda S2000</option>
          <option value="Mazda RX8" name="Mazda RX8" id="Mazda_RX8" >Mazda RX8</option>
          <option value="No Selection" name="No Selection" id="No_Selection_J">No Selection</option>
        </select>
      </p>

      <p><label for="Selection_A">American</label>
        <select id="Selection_A" name="Selection_A">
          <option value="...">Please Select...</option>
          <option value="Ford Mustang" name="Ford Mustang" id="Ford_Mustang">Ford Mustang</option>
          <option value="Chevrolet Camaro" name="Chevrolet Camaro" id="Chevrolet_Camaro">Chevrolet Camaro</option>
          <option value="Cadillac CTS" name="Cadillac CTS" id="Cadillac_CTS">Cadillac CTS</option>
          <option value="Dodge Charger" name="Dodge Charger" id="Dodge_Charger">Dodge Charger</option>
          <option value="Dodge Viper" name="Dodge Viper" id="Dodge_Viper">Dodge Viper</option>
          <option value="Chevrolet Corvette" name="Chevrolet Corvette" id="Chevrolet_Corvette">Chevrolet Corvette</option>
          <option value="No Selection" name="No Selection" id="No_Selection_A">No Selection</option>
        </select>
      </p>
  </fieldset>

  <fieldset>
    <legend>Additional Enquiries</legend>
    <h2>Click on the Checkbox for any addons</h2>
    <table id="table_enquiry">
      <thead>
        <tr>
          <th>Car Addons/Modifications</th>
          <th>Price</th> 
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>Automatic Transmission</td>
          <td>$1000</td>
        </tr>
        <tr>
          <td>Manual Transmission</td>
          <td>$550</td>
        </tr>
        <tr>
          <td>Spoilers</td>
          <td>$500</td>
        </tr>
        <tr>
          <td>Alloys</td>
          <td>$1100</td>
        </tr>
      </tbody>
    </table>

  <p id="requests">
    <span><label for="Automatic">Automatic: </label>
      <input type="checkbox" id="Automatic" name="requests" value="Automatic" /> </span>

    <span><label for="Manual">Manual: </label>
      <input type="checkbox" id="Manual" name="requests" value="Manual" /> </span>

    <span><label for="Spoiler">Spoiler: </label>
      <input type="checkbox" id="Spoiler" name="requests" value="Spoiler" /> </span>

    <span><label for="Alloy">Alloy: </label>
      <input type="checkbox" id="Alloy" name="requests" value="Alloy" /> </span>
  </p>

    <p><label for="quantity">Quantity:</label>
      <input type="text" id="quantity" name="quantity" value="quantity" placeholder="0-123123123124123" /></p>
  </fieldset>

  <fieldset>
    <legend>Preferred Date and Time for Test Drive/Pickup</legend>

      <p><label for="date">Date</label>
      <input type="text" name="date" id="date" placeholder="yyyy-mm-dd"
      pattern="(?:19|20)[0-9]{2}-(?:(?:0[1-9]|1[0-2])-(?:0[1-9]|1[0-9]|2[0-9])|(?:(?!02)(?:0[1-9]|1[0-2])-(?:30))|(?:(?:0[13578]|1[02])-31))" />
      </p>
      <p><label for="time">Time</label>
        <input type="time" id="time" />
      </p>
      <input type="submit" value="Pay Now"/>
      <input type="reset" id="cancelButton" value="Reset" />
  </fieldset>
</form>

<footer class="footer_enq_prod">
  <strong> Exotic Customs.Pty </strong>
  <span> 101 Birmingham Ln, Toorak</span>
</footer>
</section>

</body>
</html>