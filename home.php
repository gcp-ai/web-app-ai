<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AI Chat Window</title>
    <link href="assets/bootstrap.min.v5.3.2.css" rel="stylesheet">
    <link href="assets/style.css" rel="stylesheet">
</head>

<body>
    <div class="header">
        <div class="tabs">
            <button class="active" id="interactiveTab" onclick="toggleTab('interactive')">Interactive</button>
            <button id="webAppTab" onclick="toggleTab('webApp')">Web Application</button>
        </div>
    </div>
    <div id="interactiveContent" class="chat-container">
        <div class="chat-area" id="chatArea">
            <div class="chat-message user">
                <div class="bubble ques"></div>
            </div>
            <div class="chat-message bot">
                <div class="bubble ans"></div>
                <img class="loadingimg" src="assets/typing-text.gif" width="80">
            </div>
        </div>
        <div class="chat-message bot justify-content-center">
                <div class="">Hello! How can I assist you today?</div>
            </div>
        <div class="chat-footer mb-4">
            <div class="chat-input-container">
                <textarea class="chat-input" id="chatInput" rows="2" placeholder="Type your message..."></textarea>
                <button class="send-button" onclick="sendMessage()">
                    <img src="assets/arrow-up.svg" alt="" width="28px">
                </button>
            </div>
        </div>
    </div>
    <div id="webAppContent" class="mt-5 pt-3 d-none">
        <div class="container ">
    <div class="row">
        <div class="col-md-8 mx-auto mb-3">
                <div class="hotel-card">
                <!-- Hotel Information Section -->
                <div class="hotel-info">
                    <h3>Hotel Rudraksha <span>⭐⭐⭐</span></h3>
                    <div class="location">Vijay Nagar</div>
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
                    <div class="price">₹2,785</div>
                    <div>+ ₹643 taxes & fees</div>
                    <div class="book-now">Login to Book Now & Pay Later!</div>
                </div>
            </div>
                <!-- Offer Section -->
                <div class="footer-offer">
                    Interest Free EMI Offer on Federal Bank Credit Cards. Get INR 458 Off
                </div>
        </div>
        <div class="col-md-8 mx-auto mb-3">
                <div class="hotel-card">
                <!-- Hotel Information Section -->
                <div class="hotel-info">
                    <h3>Hotel Rudraksha <span>⭐⭐⭐</span></h3>
                    <div class="location">Vijay Nagar</div>
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
                    <div class="price">₹2,785</div>
                    <div>+ ₹643 taxes & fees</div>
                    <div class="book-now">Login to Book Now & Pay Later!</div>
                </div>
            </div>
                <!-- Offer Section -->
                <div class="footer-offer">
                    Interest Free EMI Offer on Federal Bank Credit Cards. Get INR 458 Off
                </div>
        </div>
    </div>
        </div>
    </div>

    <script>
        function toggleTab(tab) {
            const interactiveTab = document.getElementById('interactiveTab');
            const webAppTab = document.getElementById('webAppTab');
            const interactiveContent = document.getElementById('interactiveContent');
            const webAppContent = document.getElementById('webAppContent');

            if (tab === 'interactive') {
                interactiveTab.classList.add('active');
                webAppTab.classList.remove('active');
                interactiveContent.classList.remove('d-none');
                webAppContent.classList.add('d-none');
            } else {
                webAppTab.classList.add('active');
                interactiveTab.classList.remove('active');
                webAppContent.classList.remove('d-none');
                interactiveContent.classList.add('d-none');
            }
        }

        function sendMessage() {
            $('.ques').show();
            $('.ques').html($('.chat-input').val());
            $('.ans').html('');
            var ques_text = $('.chat-input').val();
            $('.chat-input').val('');
            $('.loadingimg').show();

            $.ajax({
                url: "/getanswer",
                type: "POST",
                data: {question:ques_text},
                success: function(r) {

                    try {
                        var data = $.parseJSON(r);
                        $('.loadingimg').hide();
                        $('.ques').html(ques_text);
                        $('.ans').html(data.answer);
                        $('.chat-input').val('');
                    }
                    catch(err) {
                        $('.loadingimg').hide();
                        $('.ques').html(ques_text);
                        $('.ans').html('Something went wrong. Please ask again.');
                        $('.chat-input').val('');
                    }

                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    $('.loadingimg').hide();
                }
            });
        }

    </script>

    <script src="assets/js/jquery.min.js"></script>

    <script>
        $(document).ready(function(){
            $('.ques').hide();
            $('.loadingimg').hide();
        });
    </script>
</body>

</html>