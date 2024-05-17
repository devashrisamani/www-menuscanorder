<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Welcome to Menu Scan Order</title>

    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css"
      rel="stylesheet"
    />
    <style>
      /* Google Fonts Import */
      @import url("https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Playfair+Display:ital,wght@0,400..900;1,400..900&family=Yarndings+12&display=swap");
      html,
      body {
        font-family: "Lato", sans-serif;
        background-color: #f2efe9;
      }

      .navbar font {
        font-family: Georgia, "Times New Roman", Times, serif;
      }

      .btn-sign-up {
        background-color: white;
        color: black;
        border-color: white;
      }

      .btn-sign-up:hover {
        background-color: #f2efe9;
        color: black;
      }

      .custom-heading {
        font-family: "Playfair Display", serif;
        font-weight: 500;
        color: #142615;
      }

      .header-banner {
        background-color: #fff;
        padding: 3rem 0;
      }
      .header-image {
        /* Image Source: https://neatmenu.io/blog/ultimate-guide-digital-menus-restaurants.html */
        background: url("images/msc.jpg") no-repeat center center;
        background-size: cover;
        height: 400px;
      }
      .get-started-btn {
        background-color: #477346;
        color: #ffffff;
      }

      .get-started-btn:hover {
        background-color: #224021;
        color: #ffffff;
      }
      .features-section {
        padding: 2rem 0;
      }
      .feature-box {
        padding: 1rem;
        background: white;
        border-radius: 0.5rem;
        margin: 1rem 0;
      }
      .sign-up-banner {
        padding: 2rem 0;
        background: #333;
        color: white;
        text-align: center;
      }

      .feature-icon {
        color: #224021;
      }
      .feature-text {
        padding-left: 20px;
        font-size: 0.95rem;
      }
      .features-row {
        justify-content: center;
      }
      .feature-item {
        display: flex;
        align-items: center;
        padding: 10px 0;
      }

      .accordion-button:not(.collapsed) {
        color: #477346;
        background-color: #f1f1f2;
        border-color: #dee2e6;
      }

      .accordion-body {
        color: #212529;
      }
    </style>
  </head>
  <body>
    <!-- Navbar -->
    <nav
      class="navbar navbar-expand-lg navbar-dark px-lg-5 font sticky-top"
      style="background-color: #072405"
    >
      <div class="container-fluid">
        <a class="navbar-brand ps-lg-2" href="#">Menu Scan Order</a>
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarNavAltMarkup"
          aria-controls="navbarNavAltMarkup"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse links" id="navbarNavAltMarkup">
          <div class="navbar-nav ms-auto">
            <a class="nav-link" href="#">Home</a>
            <a class="nav-link" href="#features">Features</a>
            <a class="nav-link" href="#faq">FAQs</a>
            <a class="nav-link" href="<?= site_url('login'); ?>">Login</a>

            <a href="<?= site_url('register'); ?>" class="btn btn-primary ms-2 btn-sign-up">Sign Up</a>

          </div>
        </div>
      </div>
    </nav>

    <!-- Header with banner -->
    <header class="header-banner">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-6">
            <h1 class="custom-heading">Simplifying Orders via QR Code Menus</h1>
            <p class="mt-3">
              QR codes streamline self-service ordering directly from the menu,
              accelerating service delivery and enhancing the overall experience
              for both customers and staff.
            </p>
            <a href="<?= site_url('register'); ?>" class="btn get-started-btn mt-4 mb-3 mb-lg-0">Get Started</a>
          </div>
          <div class="col-lg-6 header-image"></div>
        </div>
      </div>
    </header>

    <!-- Highlighting Features -->
    <section id="features" class="container features-section">
      <div class="row text-center">
        <div class="col-md-4">
          <div class="feature-box">
            <h3>Manage Menu</h3>
            <p>
              Efficiently craft and update digital menus in real-time with a few
              clicks.
            </p>
          </div>
        </div>

        <div class="col-md-4">
          <div class="feature-box">
            <h3>QR Code Generation</h3>
            <p>
              Instantly create and display QR codes to transform smartphones
              into interactive menus.
            </p>
          </div>
        </div>

        <div class="col-md-4">
          <div class="feature-box">
            <h3>Manage Orders</h3>
            <p>
              Monitor and manage orders with ease, enhancing your operational
              flow.
            </p>
          </div>
        </div>
      </div>
    </section>

    <!-- Features -->
    <div
      class="container-fluid my-5 feature-section-bg py-4"
      style="background-color: #fff"
    >
      <div class="row text-center my-5">
        <h2 class="custom-heading col-12">
          Streamline operations and improve customer service.
        </h2>
      </div>

      <div class="row justify-content-center my-5 px-md-5">
        <div class="col-md-6">
          <div class="feature-item">
            <i class="bi bi-credit-card feature-icon"></i>
            <span class="feature-text">
              Offer a variety of payment options, including popular digital
              wallets, to expedite checkout
            </span>
          </div>
          <div class="feature-item">
            <i class="bi bi-people feature-icon"></i>
            <span class="feature-text">
              Free up staff to focus on fulfilling orders and creating an
              optimal guest experience
            </span>
          </div>
          <div class="feature-item">
            <i class="bi bi-journal-text feature-icon"></i>
            <span class="feature-text">
              Allow customers the convenience of opening and paying for their
              tabs directly from their devices, reducing wait times
            </span>
          </div>
          <div class="feature-item">
            <i class="bi bi-graph-up feature-icon"></i>
            <span class="feature-text">
              Collect and analyze customer ordering data to tailor marketing
              strategies and cultivate loyalty
            </span>
          </div>
        </div>
        <div class="col-md-6">
          <div class="feature-item">
            <i class="bi bi-speedometer2 feature-icon"></i>
            <span class="feature-text">
              Leverage the platform to manage table turnover more effectively,
              leading to increased capacity and revenue
            </span>
          </div>
          <div class="feature-item">
            <i class="bi bi-hand-thumbs-up feature-icon"></i>
            <span class="feature-text">
              Give diners the freedom to order when they want—without waiting
              for a server
            </span>
          </div>
          <div class="feature-item">
            <i class="bi bi-phone feature-icon"></i>
            <span class="feature-text">
              Make ordering easy and intuitive with a mobile-optimized menu and
              payment experience
            </span>
          </div>
          <div class="feature-item">
            <i class="bi bi-ui-checks-grid feature-icon"></i>
            <span class="feature-text">
              Keep your kitchen in sync with real-time updates, grouping orders
              by table for clarity and efficiency
            </span>
          </div>
        </div>
      </div>
    </div>

    <!-- FAQ Section -->
    <section id="faq" class="container my-5">
      <h2 class="text-center mb-4 custom-heading">FAQs</h2>
      <div class="accordion" id="faqAccordion">
        <div class="accordion-item">
          <h2 class="accordion-header" id="headingOne">
            <button
              class="accordion-button"
              type="button"
              data-bs-toggle="collapse"
              data-bs-target="#collapseOne"
              aria-expanded="true"
              aria-controls="collapseOne"
            >
              What is a QR code menu?
            </button>
          </h2>
          <div
            id="collapseOne"
            class="accordion-collapse collapse show"
            aria-labelledby="headingOne"
            data-bs-parent="#faqAccordion"
          >
            <div class="accordion-body">
              A QR code menu is a digital version of your restaurant menu that
              customers can access on their smartphones by scanning a QR code.
            </div>
          </div>
        </div>

        <div class="accordion-item">
          <h2 class="accordion-header" id="headingOne">
            <button
              class="accordion-button"
              type="button"
              data-bs-toggle="collapse"
              data-bs-target="#collapseOne"
              aria-expanded="true"
              aria-controls="collapseOne"
            >
              How do I set up a digital menu for my restaurant?
            </button>
          </h2>
          <div
            id="collapseOne"
            class="accordion-collapse collapse show"
            aria-labelledby="headingOne"
            data-bs-parent="#faqAccordion"
          >
            <div class="accordion-body">
              Simply sign up for an account, input your menu details, and our
              system will generate a QR code for your tables that customers can
              scan to view and order from your menu.
            </div>
          </div>
        </div>

        <div class="accordion-item">
          <h2 class="accordion-header" id="headingOne">
            <button
              class="accordion-button"
              type="button"
              data-bs-toggle="collapse"
              data-bs-target="#collapseOne"
              aria-expanded="true"
              aria-controls="collapseOne"
            >
              Are the QR codes unique to each table?
            </button>
          </h2>
          <div
            id="collapseOne"
            class="accordion-collapse collapse show"
            aria-labelledby="headingOne"
            data-bs-parent="#faqAccordion"
          >
            <div class="accordion-body">
              Yes, every table in your restaurant will have its own unique QR
              code, allowing for orders to be placed at the specific table.
            </div>
          </div>
        </div>

        <div class="accordion-item">
          <h2 class="accordion-header" id="headingOne">
            <button
              class="accordion-button"
              type="button"
              data-bs-toggle="collapse"
              data-bs-target="#collapseOne"
              aria-expanded="true"
              aria-controls="collapseOne"
            >
              Is customer data secure with Menu Scan Order?
            </button>
          </h2>
          <div
            id="collapseOne"
            class="accordion-collapse collapse show"
            aria-labelledby="headingOne"
            data-bs-parent="#faqAccordion"
          >
            <div class="accordion-body">
              Security is a top priority for us. We employ robust encryption and
              security practices to ensure all customer data is securely stored
              and handled.
            </div>
          </div>
        </div>

        <div class="accordion-item">
          <h2 class="accordion-header" id="headingOne">
            <button
              class="accordion-button"
              type="button"
              data-bs-toggle="collapse"
              data-bs-target="#collapseOne"
              aria-expanded="true"
              aria-controls="collapseOne"
            >
              How quickly can changes to the menu be made live?
            </button>
          </h2>
          <div
            id="collapseOne"
            class="accordion-collapse collapse show"
            aria-labelledby="headingOne"
            data-bs-parent="#faqAccordion"
          >
            <div class="accordion-body">
              Changes to your menu are updated in real-time. As soon as you save
              your edits, the new menu will be immediately available to
              customers through the QR code scan.
            </div>
          </div>
        </div>

        <div class="accordion-item">
          <h2 class="accordion-header" id="headingOne">
            <button
              class="accordion-button"
              type="button"
              data-bs-toggle="collapse"
              data-bs-target="#collapseOne"
              aria-expanded="true"
              aria-controls="collapseOne"
            >
              Can I see a history of all orders placed?
            </button>
          </h2>
          <div
            id="collapseOne"
            class="accordion-collapse collapse show"
            aria-labelledby="headingOne"
            data-bs-parent="#faqAccordion"
          >
            <div class="accordion-body">
              Yes, the administration dashboard provides a complete history of
              orders, including details such as order time, items, and order
              status.
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Sign Up or Login Option -->
    <section
      id="signup"
      class="sign-up-banner"
      style="background-color: #010d00"
    >
      <h2>Join Us!</h2>
      <p style="white-space: nowrap;">Sign up now to Menu Scan & Order or<a class="nav-link" href="<?= site_url('login'); ?>" style="display: inline; padding-left: 5px;">Login!</a></p>
      <a href="<?= site_url('register'); ?>" class="btn btn-primary ms-2 btn-sign-up">Sign Up</a>
    </section>

    <!-- Bootstrap JS for responsive navigation bar -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>

<!-- Referenced Generative AI to develop this page. Chat GPT and Pop AI. -->