import CaptchaManager from "./CaptchaManager.js";

document.addEventListener("DOMContentLoaded", function () {
  const submitButton = document.getElementById("submitButton");

  const submitFormWithCaptcha = document.querySelector(
    '[data-action="submit"]'
  );

  // Access the data attributes
  let dataAction = submitFormWithCaptcha.getAttribute("data-action");
  let dataSiteKey = submitFormWithCaptcha.getAttribute("data-sitekey");
  let dataCallback = submitFormWithCaptcha.getAttribute("data-callback");
  let tokenFieldId = document.getElementById("recaptchaToken");
  let formID = document.getElementById("contactForm");

  const manageCaptcha = new CaptchaManager(
    dataSiteKey,
    dataAction,
    formID,
    tokenFieldId,
    dataCallback
  );

  submitButton.addEventListener("click", (event) => {
    event.preventDefault();
    manageCaptcha.initCaptcha();
    console.log("we");
  });
});
