<!DOCTYPE html>
<form class="telegram-form">
    <div class="selection" id="selection_specialty">
        <p class="center">Specialty</p>
        <select name="specialty" id="specialty" class="select">
            <option value="nothing" selected></option>
            <option value="Full stack">Full stack</option>
            <option value="Backend">Backend</option>
            <option value="Frontend">Frontend</option>
            <option value="QA Automation">QA Automation</option>
            <option value="QA Manual">QA Manual</option>
            <option value="DevOps">DevOps</option>
            <option value="Mobil developer">Mobil developer</option>
            <option value="Data scientist/Data engineer">Data scientist / Data engineer</option>
        </select>
    </div>
    <div class="selection" id="selection_level-programming">
        <p class="center">Level of experience in development</p>
        <select name="level-programming" id="level-programming" class="select">
            <option value="nothing" selected></option>
            <option value="Junior">Junior</option>
            <option value="Middle">Middle</option>
            <option value="Senior">Senior</option>
            <option value="Teamlead">Teamlead</option>
            <option value="Techlead">Techlead</option>
        </select>
    </div>
    <div class="selection" id="selection_level-english">
        <p class="center">Level of English</p>
        <select name="level-english" id="level-english" class="select">
            <option value="nothing" selected></option>
            <option value="A1">A1</option>
            <option value="A2">A2</option>
            <option value="B1">B1</option>
            <option value="B2">B2</option>
            <option value="C1">C1</option>
            <option value="C2">C2</option>
        </select>
    </div>
    <div id="selection_question">
        <div class="text-line-height selection" id="selection_question_text-area">
            <p>Tell us about yourself</p>
            <p>-What do you like to do?</p>
            <textarea name="text"></textarea>
        </div>
        <div class="center" id="selection_question_radio">
            <input type="radio" id="radio-button">
            <p id="radio-text">Are you ready to do the test task?</p>
        </div>
        <div class="file-upload center" id="selection_question_choose">
            <label class="btn"><input id="file-input" type="file" name="file"><p id="choose-text">Choose a file</p></label>
            <div id="file-name">No file selected</div>
        </div>
        <div class="top" id="selection_question_btn">
            <button type="submit" class="btn">SEND</button>
        </div>
    </div>
</form>