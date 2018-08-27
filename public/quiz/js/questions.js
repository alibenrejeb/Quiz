window.onload = function () {

    // Questions
    var $addQuestionLink = $('<a href="#" class="add_question_link">Add a question</a>');
    var $newLinkQuestion = $('<li></li>').append($addQuestionLink);

    // Answers
    var $addAnswerLink = $('<a href="#" class="add_answer_link">Add an answer</a>');
    var $newLinkAnswer = $('<li></li>').append($addAnswerLink);
    

    jQuery(document).ready(function () {

        // Questions
        var $collectionHolderQuestion = $('ul.questions');
        $collectionHolderQuestion.append($newLinkQuestion);
        $collectionHolderQuestion.data('indexQ', $collectionHolderQuestion.find(':input').length);

        $collectionHolderQuestion.find('li').each(function() {
            addQuestionFormDeleteLink($(this));
        });

        $addQuestionLink.on('click', function (e) {
            e.preventDefault();
            addQuestionForm($collectionHolderQuestion, $newLinkQuestion);
        });

        // Answers
        var $collectionHolderAnswer = $('div.answers');
        $collectionHolderAnswer.append($newLinkAnswer);
        $collectionHolderAnswer.data('indexA', $collectionHolderAnswer.find(':input').length);

        $collectionHolderAnswer.find('li').each(function() {
            addAnswerFormDeleteLink($(this));
        });

        $addAnswerLink.on('click', function (e) {
            e.preventDefault();
            addAnswerForm($collectionHolderAnswer, $newLinkAnswer);
        });
        
    });

    // Questions
    function addQuestionForm($collectionHolderQuestion, $newLinkQuestion) {

        var prototypeQ = $collectionHolderQuestion.data('prototype');
        var indexQ = $collectionHolderQuestion.data('indexQ');
        var newFormQ = prototypeQ.replace(/__question__/g, indexQ);

        $collectionHolderQuestion.data('indexQ', indexQ + 1);

        var $newFormQuestion = $('<li></li>').append(newFormQ);

        $newFormQuestion.append('<a href="#" class="remove-question">x</a>');
        $newLinkQuestion.before($newFormQuestion);

        var a = $($newFormQuestion).find('fieldset div').data('prototype');

        console.log($($newFormQuestion).find('fieldset div').data('prototype'));

        // handle the removal, just for this example
        $('.remove-question').click(function (e) {
            e.preventDefault();

            $(this).parent().remove();

            return false;
        });

        addQuestionFormDeleteLink($newFormQuestion);
    }

    function addQuestionFormDeleteLink($questionFormLi) {
        var $removeFormButton = $('<button type="button">Delete this Question</button>');
        $questionFormLi.append($removeFormButton);

        $removeFormButton.on('click', function(e) {
            // remove the li for the tag form
            $questionFormLi.remove();
        });

    }

    // Answers
    function addAnswerForm($collectionHolderAnswer, $newLinkAnswer) {

        var prototypeA = $collectionHolderAnswer.data('prototype');
        var indexA = $collectionHolderAnswer.data('indexA');
        var newFormA = prototypeA.replace(/__answer__/g, indexA);


        $collectionHolderAnswer.data('indexA', indexA + 1);

        var $newFormAnswer = $('<li></li>').append(newFormA);

        $newFormAnswer.append('<a href="#" class="remove-answer">x</a>');
        $newLinkAnswer.before($newFormAnswer);

        $('.remove-answer').click(function (e) {
            e.preventDefault();

            $(this).parent().remove();

            return false;
        });

        addAnswerFormDeleteLink($newFormAnswer);
    }

    function addAnswerFormDeleteLink($AnswerFormLi) {
        var $removeFormButton = $('<button type="button">Delete this answer</button>');
        $AnswerFormLi.append($removeFormButton);

        $removeFormButton.on('click', function(e) {
            // remove the li for the tag form
            $AnswerFormLi.remove();
        });
    }
};