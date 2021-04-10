function check(question_id, selection_id, valid_id){

  // クリック無効化
  var answerlists = document.getElementsByName('choices_' + question_id);
  answerlists.forEach(answerlist => {
      answerlist.style.pointerEvents = 'none';
  });
  
  // 選択肢のスタイル設定
  var selectiontext = document.getElementById('quiz_' + question_id + '_' + selection_id);
  var validtext = document.getElementById('quiz_' + question_id + '_' + valid_id);
  selectiontext.className = 'answer_invalid';
  validtext.className = 'answer_valid';
  
  // 正解・不正解の表示設定処理
  var answerbox = document.getElementById('answerbox_' + question_id);
  var answertext = document.getElementById('answertext_' + question_id);
  if (selection_id == valid_id) {
    answertext.className = 'answerbox_valid';
    answertext.innerText = '正解！';
  } else {
    answertext.className = 'answerbox_invalid';
    answertext.innerText = '不正解！';
  }
  answerbox.style.display = 'block';  
}

