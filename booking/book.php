<html>
<head>
<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places"></script>
<style>
    #map {
  width: 100%;
  height: 400px;
}
</style>
</head>
<body>
<form action="connection_booking_form.php" method="post" class="form-container">
  <div class="form-row">
  
    <div class="form-group">
      <h3><label for="firstName">First Name:</label></h3>
      <input type="text" id="firstName" name="firstName" required>
    </div>
    <div class="form-group">
      <h3><label for="lastName">Last Name:</label></h3>
      <input type="text" id="lastName" name="lastName" required>
   </div>
   <div class="form-group">
      <h3><label for="email">Email:</label></h3>
      <input type="email" id="email" name="email" required>
   </div>
    <div class="form-group">
      <h3><label for="phone">Phone:</label></h3>
      <input type="tel" id="phone" name="phone" required>
    </div>
    <div class="form-group">
    <h3><label for="event">Event:</label></h3>
      <select id="event" name="event" required>
        <option value="">Select an event</option>
        <option value="event1">Birthday</option>
        <option value="event2">Wedding</option>
        <option value="event3">Conference</option>
        <option value="event4">Concert</option>
        <option value="event5">Met Gala</option>
        <option value="event6">Seminar and Workshop</option>
        <option value="event7">Charity Event</option>
        <option value="event8">Others</option>
      </select>
    </div>
    <div class="form-group">
      <h3><label for="date">Date:</label></h3>
      <input type="date" id="date" name="date" required>
    </div>
    <div class="form-group">
      <h3><label for="time">Time:</label></h3>
      <input type="time" id="time" name="time" required>
    </div>
    <div class="form-group">
      <h3><label for="guests">Number of guests:</label></h3>
      <input type="number" id="guests" name="guests" required>
    </div>
    <div class="form-group">
      <h3><label for="comments">Comments:</label></h3>
      <textarea id="comments" name="comments"></textarea>
    </div>
    <br>
    <div class="form-group">
      <h3><label for="equipment">Equipment:</label></h3>
      <div class="checkbox-group">
        <input type="checkbox" id="DJ" name="equipment[]" value="DJ">
        <label for="DJ">DJ</label>
      </div>
      <div class="checkbox-group">
        <input type="checkbox" id="Mike" name="equipment[]" value="Mike">
        <label for="Mike">Mike</label>
      </div>
      <div class="checkbox-group">
        <input type="checkbox" id="Speaker" name="equipment[]" value="Speaker">
        <label for="Speaker">Speaker</label>
      </div>
    </div>
    <div class="form-group">
      <h3><label for="food">Food:</label></h3>
      <div class="checkbox-group">
        <input type="checkbox" id="breakfast" name="food[]" value="Breakfast">
        <label for="breakfast">Breakfast</label>
      </div>
      <div class="checkbox-group">
        <input type="checkbox" id="lunch" name="food[]" value="Lunch">
        <label for="lunch">Lunch</label>
      </div>
      <div class="checkbox-group">
        <input type="checkbox" id="tea" name="food[]" value="Tea & Snacks">
        <label for="tea">Tea & Snacks</label>
      </div>
      <div class="checkbox-group">
        <input type="checkbox" id="dinner" name="food[]" value="Dinner">
        <label for="dinner">Dinner</label>
      </div>
    </div>
    <div class="form-group">
      <h3><label for="decoration">Decoration:</label></h3>
      <div class="checkbox-group">
        <input type="checkbox" id="lighting" name="decoration[]" value="Lighting">
        <label for="lighting">Lighting</label>
      </div>
      <div class="checkbox-group">
        <input type="checkbox" id="flower" name="decoration[]" value="Flower">
        <label for="flower">Flower</label>
      </div>
      <div class="checkbox-group">
        <input type="checkbox" id="seating" name="decoration[]" value="Seating">
        <label for="seating">Seating</label>
      </div>
    </div>
    <div class="form-group">
      <h3><label for="invitation_card">Invitation Card:</label></h3>
      <div class="checkbox-group">
        <input type="checkbox" id="Yes" name="invitation_card[]" value="Yes">
        <label for="Yes">Yes</label>
      </div>
      <div class="checkbox-group">
        <input type="checkbox" id="No" name="invitation_card[]" value="No">
        <label for="No">No</label>
      </div>
    </div>
  </div>
<br>
<div class="form-group">
  <button type="submit">Submit Request</button>
</div>
</form>
</body>
</html>