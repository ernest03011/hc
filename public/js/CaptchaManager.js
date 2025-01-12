export default class CaptchaManager {
  siteKey;
  action;
  formID;
  tokenFieldId;
  callback;

  constructor(siteKey, action, formID, tokenFieldId, callback) {
    this.siteKey = siteKey;
    this.action = action;
    this.formID = formID;
    this.tokenFieldId = tokenFieldId;
    this.callback = callback;
  }

  initCaptcha() {
    if (this.action === "submit") {
      grecaptcha.ready(() => {
        grecaptcha.execute(this.siteKey, { action: "submit" }).then((token) => {
          this.onSubmit(token);
        });
      });
    }
  }

  onSubmit(token) {
    this.tokenFieldId.value = token;
    this.formID.submit();
  }
}
