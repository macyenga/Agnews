var skin = $("body").hasClass("dark") ? "moono-dark" : "moono-lisa"; // Choose the skin based on the body class
var editor;

// Create the English editor with specific configurations
function createEnglishEditor(config) {
    CKEDITOR.config.skin = skin; // Apply the chosen skin
    editor = CKEDITOR.appendTo('editor-ltr', config); // Append the editor to the container with the id 'editor-ltr'
    editor.setData($("#content-ltr").val()); // Set the initial data from the element with id 'content-ltr'
}

var config = {};

// Configure English editor
config.language = 'en'; // Set the language to English
createEnglishEditor(config);
