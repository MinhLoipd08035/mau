<h1>Liên hệ</h1>
<div class="containerlienhe">
    <form id="contact" action="" method="post">
        <h3>LIÊN HỆ</h3>
        <h4>LIÊN HỆ VỚI CHÚNG TÔI</h4>
        <fieldset>
            <input placeholder="Tên" type="text" tabindex="1" required autofocus>
        </fieldset>
        <fieldset>
            <input placeholder="Email của bạn" type="email" tabindex="2" required>
        </fieldset>
        <fieldset>
            <input placeholder="Số điện thoại" type="tel" tabindex="3" required>
        </fieldset>
        <fieldset>
            <input placeholder="Trang web của bạn (tùy chọn)" type="url" tabindex="4" required>
        </fieldset>
        <fieldset>
            <textarea placeholder="Gõ tin nhắn của bạn ở đây...." tabindex="5" required></textarea>
        </fieldset>
        <fieldset>
            <button name="submit" type="submit" id="contact-submit" data-submit="...Sending">Gửi</button>
        </fieldset>
    </form>
</div>
<style>
    @import url(https://fonts.googleapis.com/css?family=Roboto:400,300,600,400italic);

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        -webkit-font-smoothing: antialiased;
        -moz-font-smoothing: antialiased;
        -o-font-smoothing: antialiased;
        text-rendering: optimizeLegibility;
    }

    .containerlienhe {
        max-width: 400px;
        width: 100%;
        margin: 0 auto;
        position: relative;
    }

    .containerlienhe #contact input[type="text"],
    .containerlienhe #contact input[type="email"],
    .containerlienhe #contact input[type="tel"],
    .containerlienhe #contact input[type="url"],
    .containerlienhe  #contact textarea,
    .containerlienhe #contact button[type="submit"] {
        font: 400 12px/16px "Roboto", Helvetica, Arial, sans-serif;
    }

    .containerlienhe #contact {
        background: #F9F9F9;
        padding: 25px;
        margin: 40px 0;
        box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
    }

    .containerlienhe  #contact h3 {
        display: block;
        font-size: 30px;
        font-weight: 300;
        margin-bottom: 10px;
    }

    .containerlienhe #contact h4 {
        margin: 5px 0 15px;
        display: block;
        font-size: 13px;
        font-weight: 400;
    }

    .containerlienhe fieldset {
        border: medium none !important;
        margin: 0 0 10px;
        min-width: 100%;
        padding: 0;
        width: 100%;
    }

    .containerlienhe #contact input[type="text"],
    .containerlienhe  #contact input[type="email"],
    .containerlienhe  #contact input[type="tel"],
    .containerlienhe  #contact input[type="url"],
    .containerlienhe  #contact textarea {
        width: 100%;
        border: 1px solid #ccc;
        background: #FFF;
        margin: 0 0 5px;
        padding: 10px;
    }

    .containerlienhe  #contact input[type="text"]:hover,
    .containerlienhe   #contact input[type="email"]:hover,
    .containerlienhe  #contact input[type="tel"]:hover,
    .containerlienhe  #contact input[type="url"]:hover,
    .containerlienhe  #contact textarea:hover {
        -webkit-transition: border-color 0.3s ease-in-out;
        -moz-transition: border-color 0.3s ease-in-out;
        transition: border-color 0.3s ease-in-out;
        border: 1px solid #aaa;
    }

    .containerlienhe   #contact textarea {
        height: 100px;
        max-width: 100%;
        resize: none;
    }

    .containerlienhe  #contact button[type="submit"] {
        cursor: pointer;
        width: 100%;
        border: none;
        background: #4CAF50;
        color: #FFF;
        margin: 0 0 5px;
        padding: 10px;
        font-size: 15px;
    }

    .containerlienhe    #contact button[type="submit"]:hover {
        background: #43A047;
        -webkit-transition: background 0.3s ease-in-out;
        -moz-transition: background 0.3s ease-in-out;
        transition: background-color 0.3s ease-in-out;
    }

    .containerlienhe   #contact button[type="submit"]:active {
        box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.5);
    }

    .containerlienhe .copyright {
        text-align: center;
    }

    .containerlienhe  #contact input:focus,
    .containerlienhe  #contact textarea:focus {
        outline: 0;
        border: 1px solid #aaa;
    }

    .containerlienhe   ::-webkit-input-placeholder {
        color: #888;
    }

    .containerlienhe  :-moz-placeholder {
        color: #888;
    }

    .containerlienhe  ::-moz-placeholder {
        color: #888;
    }

    .containerlienhe :-ms-input-placeholder {
        color: #888;
    }
</style>