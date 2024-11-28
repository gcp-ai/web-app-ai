<?php 

// Initialize cURL session
$ch = curl_init();

// Set the cURL options
curl_setopt($ch, CURLOPT_URL, 'https://sendbox-277094416812.us-central1.run.app/hotels');
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Authorization: Basic bWF5YW5rOjEyMzQ1Ng==',
    'Content-Type: application/json',
]);

curl_setopt($ch, CURLOPT_POSTFIELDS, '{}');

// Execute the request and capture the response
$response = curl_exec($ch);

$hotel_arr = json_decode($response,true);

$html = '';
foreach($hotel_arr['hotels'] as $val){

    $html .= '<div class="col-md-8 mx-auto mb-3">
                <div class="hotel-card">
                <!-- Hotel Information Section -->
                <div class="hotel-info">
                    <h3>'.$val['name'].' <span>⭐⭐⭐</span></h3>
                    <div class="location">'.$val['location'].'</div>
                    <div class="amenities">
                        <span>🍽 Restaurant</span>
                        <span>🎮 Indoor Games</span>
                        <span>🛎 Butler Services</span>
                    </div>
                    <div class="features">
                        <span>✔ Free Cancellation till check-in</span>
                        <span>✔ Book with ₹0 Payment</span>
                        <span>✔ Breakfast Included</span>
                    </div>
                </div>
                <!-- Hotel Rating and Price -->
                <div class="hotel-rating">
                    <div class="rating">Very Good</div>
                    <div class="rating-score">3.7</div>
                    <div>(10 Ratings)</div>
                    <div class="old-price">₹3,600</div>
                    <div class="price">$'.$val['price'].'</div>
                    <div>+ $'.$val['tax'].' taxes & fees</div>
                    <div class="book-now">Login to Book Now & Pay Later!</div>
                </div>
            </div>
                <!-- Offer Section -->
                <div class="footer-offer">
                    Interest Free EMI Offer on Federal Bank Credit Cards. Get INR 458 Off
                </div>
        </div>';

        
}

echo $html;die;