const revealText = (selector) => {
  let splitWords = function (selector) {
    var elements = document.querySelectorAll(selector);
    elements.forEach(function (el) {
      el.dataset.splitText = el.textContent;
      el.innerHTML = el.textContent
        .trim()
        .split(/\s/)
        .map(function (word) {
          // Color selected text
          const styleIndex = el.innerHTML.indexOf('style=');
          let colouredText = '';

          if (styleIndex !== -1) {
            const endTagwithStyle = el.innerHTML.indexOf('>', styleIndex);
            const startEndingTag = el.innerHTML.indexOf(
              '</span>',
              endTagwithStyle
            );
            colouredText = el.innerHTML.substring(
              endTagwithStyle + 1,
              startEndingTag
            );
          }

          return word
            .split('-')
            .map(function (word) {
              if (word !== '' && colouredText.includes(word)) {
                return '<span class="highlighted word">' + word + '</span>';
              }
              return '<span class="word">' + word + '</span>';
            })
            .join('<span class="hyphen">-</span>');
        })
        .join('<span class="whitespace"> </span>');
    });
  };
  let splitLines = function (selector) {
    var elements = document.querySelectorAll(selector);
    splitWords(selector);
    elements.forEach(function (el) {
      var lines = getLines(el);
      var wrappedLines = '';
      lines.forEach(function (wordsArr, index) {
        wrappedLines += `<span data-scroll data-scroll-offset="30%" class="c-animated-text line" style="--index:${index}"><span class="words">`;
        wordsArr.forEach(function (word) {
          wrappedLines += word.outerHTML;
        });
        wrappedLines += '</span></span>';
      });
      el.innerHTML = wrappedLines;
    });
  };
  let getLines = function (el) {
    var lines = [];
    var line;
    var words = el.querySelectorAll('span');
    var lastTop;
    for (var i = 0; i < words.length; i++) {
      var word = words[i];
      if (word.offsetTop != lastTop) {
        // Don't start with whitespace
        if (!word.classList.contains('whitespace')) {
          lastTop = word.offsetTop;
          line = [];
          lines.push(line);
        }
      }
      line.push(word);
    }
    return lines;
  };
  splitLines(selector);
};
export default revealText;
