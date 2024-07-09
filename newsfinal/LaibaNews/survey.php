<?php
session_start();
include('includes/config.php');

function sanitize_input($con, $input) {
    return mysqli_real_escape_string($con, htmlspecialchars(strip_tags($input)));
}

// Handling form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['submit_response']) && isset($_POST['survey_response'])) {
        $user_id=$_SESSION['userId']; // Replace with actual user ID retrieval logic
        foreach ($_POST['survey_response'] as $question_id => $response) {
            if (is_array($response)) {
                foreach ($response as $selected_option) {
                    $sanitized_response = sanitize_input($con, $selected_option);
                    
                    // Insert the response into the survey_response table
                    $stmt = $con->prepare("INSERT INTO survey_response (user_id, response_text) VALUES (?, ?)");
                    $stmt->bind_param("is", $user_id, $sanitized_response);
                    
                    if ($stmt->execute()) {
                        // Get the last inserted response_id
                        $response_id = $stmt->insert_id;
                        
                        // Insert the response_id and question_id into the survey table
                        $stmt_survey = $con->prepare("INSERT INTO survey (response_id, question_id) VALUES (?, ?)");
                        $stmt_survey->bind_param("ii", $response_id, $question_id);
                        if (!$stmt_survey->execute()) {
                            echo "Error: " . $stmt_survey->error;
                        }
                        $stmt_survey->close();
                    } else {
                        echo "Error: " . $stmt->error;
                    }
        
                    $stmt->close();
                }
            } else {
                $sanitized_response = sanitize_input($con, $response);
                
                // Insert the response into the survey_response table
                $stmt = $con->prepare("INSERT INTO survey_response (user_id, response_text) VALUES (?, ?)");
                $stmt->bind_param("is", $user_id, $sanitized_response);
                
                if ($stmt->execute()) {
                    // Get the last inserted response_id
                    $response_id = $stmt->insert_id;
                    
                    // Insert the response_id and question_id into the survey table
                    $stmt_survey = $con->prepare("INSERT INTO survey (response_id, question_id) VALUES (?, ?)");
                    $stmt_survey->bind_param("ii", $response_id, $question_id);
                    if (!$stmt_survey->execute()) {
                        echo "Error: " . $stmt_survey->error;
                    }
                    $stmt_survey->close();
                } else {
                    echo "Error: " . $stmt->error;
                }
    
                $stmt->close();
            }
        }
        echo "Responses saved successfully!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Survey</title>
    <link rel="stylesheet" href="Home.css">
    <style>
        /* Additional CSS for survey form styling */
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
        }
        .question {
            margin-bottom: 20px;
        }
        .rating label {
            display: block;
            margin-bottom: 10px;
        }
        .checkbox-label {
            display: inline-block;
            margin-right: 10px;
        }
        .submit-button {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <h2>Survey</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" id="surveyForm">
        <div>
            <?php 
            $queryQ = mysqli_query($con, "SELECT question_id, question_text FROM survey_question"); 
            if ($queryQ && $queryQ->num_rows > 0): 
                while ($row = mysqli_fetch_array($queryQ)): ?>
                    <div class="question">
                        <h3><?php echo htmlspecialchars($row['question_text']); ?></h3>
                        <div class="rating">
                            <label class="checkbox-label">
                                <input type="checkbox" name="survey_response[<?php echo $row['question_id']; ?>][]" value="1"> 1 - Bad
                            </label>
                            <label class="checkbox-label">
                                <input type="checkbox" name="survey_response[<?php echo $row['question_id']; ?>][]" value="2"> 2
                            </label>
                            <label class="checkbox-label">
                                <input type="checkbox" name="survey_response[<?php echo $row['question_id']; ?>][]" value="3"> 3
                            </label>
                            <label class="checkbox-label">
                                <input type="checkbox" name="survey_response[<?php echo $row['question_id']; ?>][]" value="4"> 4
                            </label>
                            <label class="checkbox-label">
                                <input type="checkbox" name="survey_response[<?php echo $row['question_id']; ?>][]" value="5"> 5 - Good
                            </label>
                        </div>
                    </div>
                <?php endwhile; ?>
                <div class="submit-button">
                    <input type="submit" name="submit_response" value="Submit">
                </div>
            <?php else: ?>
                <p>No questions found.</p>
            <?php endif; ?>  
        </div>
    </form>

    <script>
        // JavaScript for responsiveness and interaction
        window.addEventListener('load', function() {
            adjustFormLayout();
        });

        function adjustFormLayout() {
            var questions = document.querySelectorAll('.question');
            questions.forEach(function(question) {
                var ratingDiv = question.querySelector('.rating');
                if (ratingDiv) {
                    var checkboxes = ratingDiv.querySelectorAll('input[type="checkbox"]');
                    checkboxes.forEach(function(checkbox) {
                        checkbox.addEventListener('change', function() {
                            var radios = ratingDiv.querySelectorAll('input[type="radio"]');
                            radios.forEach(function(radio) {
                                radio.checked = false;
                            });
                        });
                    });
                }
            });
        }
    </script>
</body>
</html>
