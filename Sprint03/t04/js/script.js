let houseMixin = {
  wordReplace(replaced_word, new_word) {
    this.description = this.description.replace(replaced_word, new_word);
  },
  wordInsertAfter(after_word, new_word) {
    this.description = this.description.replace(after_word, after_word + " " + new_word);
  },
  wordDelete(word) {
    this.description = this.description.replace(word, "");
  },
  wordEncrypt() {
    this.description = (this.description + "").replace(/[a-zA-Z]/gi, function(s) {
      return String.fromCharCode(s.charCodeAt(0) + (s.toLowerCase() < "n" ? 13 : -13));
    });
  },
  wordDecrypt() {
    this.wordEncrypt();
  }
};
