<?php
/**
 * data.php — all portfolio content lives here.
 * Edit this file to change text, projects, or videos without touching the layout.
 */

$profile = [
    'name'    => 'Aira Villanueva',
    'brand'   => 'Portfolio',
    'tagline' => 'Information Technology student who enjoys building useful apps and websites.',
    'photo'   => 'images/aira-villanueva.png',
    'about_h' => 'Building digital experiences from the ground up.',
    'about_p' => 'Currently pursuing an Information Technology degree, focusing on core programming fundamentals, Java console applications, backend logic, and responsive web frontend engineering.',
];

/* ---------- Stamp cards shown in the portfolio grid ---------- */
$stamps = [
    [
        'num'    => '01',
        'title'  => 'Tuition Scholar',
        'sub'    => '[ JAVA GUI & AWT ]',
        'badge'  => 'GUI APP',
        'badge_class' => 'badge-teal',
        'href'   => '?project=tuition#portfolio',
        'mock'   => true,
    ],
    [
        'num'    => '02',
        'title'  => 'Simple Calculator',
        'sub'    => '[ C# CONSOLE APP ]',
        'badge'  => 'INSPECT',
        'badge_class' => 'badge-royal',
        'href'   => '?project=calc#portfolio',
        'mock'   => true,
        'mock_top' => 'C# Console',
        'mock_title' => 'Simple Calculator',
    ],
    [
        'num'    => '03',
        'title'  => 'Login Auth',
        'sub'    => '[ CREDENTIAL LOGIC ]',
        'badge'  => 'INSPECT',
        'badge_class' => 'badge-emerald',
        'href'   => '?project=auth#portfolio',
        'mock'   => true,
        'mock_title' => 'Login Auth',
    ],
    [
        'num'    => '04',
        'title'  => 'Sports Training Academy',
        'sub'    => '[ JAVA CONSOLE SYSTEM ]',
        'badge'  => 'INSPECT',
        'badge_class' => 'badge-teal',
        'href'   => '?project=sports#portfolio',
        'mock'   => true,
        'mock_top' => 'Java Console',
        'mock_title' => 'Sports Training Academy',
    ],
    [
        'num'    => '05',
        'title'  => 'PetCare Plus',
        'sub'    => '[ VETERINARY BOOKING SYSTEM ]',
        'badge'  => 'INSPECT',
        'badge_class' => 'badge-royal',
        'href'   => '?project=petcare#portfolio',
        'mock'   => true,
        'mock_top' => 'PHP Web App',
        'mock_title' => 'PetCare Plus',
    ],
    [
        'num'    => '06',
        'title'  => 'HTML Media',
        'sub'    => '[ VIDEO AND AUDIO ]',
        'badge'  => 'INSPECT',
        'badge_class' => 'badge-teal',
        'href'   => '?project=media#portfolio',
        'mock'   => true,
        'mock_top' => 'HTML and CSS',
        'mock_title' => 'HTML Media',
    ],
    [
        'num'    => '07',
        'title'  => 'Screen Time',
        'sub'    => '[ STREAMING APP PROTOTYPE ]',
        'badge'  => 'INSPECT',
        'badge_class' => 'badge-emerald',
        'href'   => '?project=screentime#portfolio',
        'mock'   => true,
        'mock_top' => 'Mobile App Prototype',
        'mock_title' => 'Screen Time',
    ],
    [
        'num'    => '08',
        'title'  => 'QuizRush',
        'sub'    => '[ GENERAL KNOWLEDGE QUIZ ]',
        'badge'  => 'INSPECT',
        'badge_class' => 'badge-royal',
        'href'   => '?project=quizrush#portfolio',
        'mock'   => true,
        'mock_top' => 'Android Quiz App',
        'mock_title' => 'QuizRush',
    ],
];

/* ---------- Project details (shown in the modal) ---------- */
$projects = [

    'tuition' => [
        'num'   => 'PROJECT 01',
        'title' => 'Tuition Scholarship System',
        'desc'  => 'A Java Swing/AWT desktop application designed to compute tuition fee discounts, optional charges (full payment, installments, library & medical fees), excess unit fees, and sibling discounts based on student GWA.',
        'img' => 'images/myphoto.png',
        'file'  => 'TuitionScholarFrame.java',
        'tags'  => ['Java Swing', 'java.awt.event', 'GUI Development', 'Discount Algorithms', 'Form Processing'],
        'code'  => <<<'CODE'
private void totalActionPerformed(java.awt.event.ActionEvent evt) {
    String name = studentName.getText();
    double tuition = Double.parseDouble(tuitionFee.getText());
    double average = Double.parseDouble(gwa1.getText());
    int totalUnits = Integer.parseInt(unit.getText());
    int sib = Integer.parseInt(siblings.getText());

    double discountAmount = 0;
    double discount = 0;

    if (average >= 1.00 && average <= 1.25) {
        discount += 1.00;
    } else if (average >= 1.26 && average <= 1.50) {
        discount += 0.50;
    } else if (average >= 1.51 && average <= 1.75) {
        discount += 0.25;
    } else if (average >= 1.76 && average <= 2.00) {
        discount += 0.10;
    } else {
        discount += 0;
    }

    discountAmount = tuition * discount;
    double discountedTuition = tuition - discountAmount;

    double excess = 0.0;
    if (totalUnits > 18) {
        excess = (totalUnits - 18) * 800;
    }

    double siblingsDiscount = 0.0;
    if (sib >= 2) {
        siblingsDiscount += 1000;
    }

    // Optional Fees & Final Total Computation
    double optionalFees = 2300.0; // Library, Medical, Lab & Installment Fees
    double totalPayable = discountedTuition + optionalFees + excess - siblingsDiscount;

    // Display summary output
    lblSummary.setText("Student Name: " + name + 
        "\nGWA: " + average + 
        "\nOptional Fees: " + optionalFees + 
        "\nExcess Units Charge: " + excess + 
        "\nSiblings Discount: " + siblingsDiscount + 
        "\nTotal Payable: " + totalPayable);
}
CODE,
        'output' => <<<'OUT'
=== JAVA SWING GUI EXECUTION RESULT ===
Student Name: Aira
GWA: 1.75
Base Tuition Fee: 5000.0
GWA Discount (25%): 1250.0
Discounted Tuition: 3750.0
---------------------------------------
Optional Fees: 2300.0
Excess Units Charge: 0.0
Siblings Discount: 1000.0
---------------------------------------
TOTAL PAYABLE: 2550.00
[Action Listener executed successfully]
OUT,
    ],

    'calc' => [
        'num'   => 'PROJECT 03',
        'title' => 'Simple Calculator',
        'desc'  => 'A C# console calculator that accepts two numbers and displays their sum, difference, product, and quotient.',
        'img'   => 'images/csharp-calculator.png',
        'file'  => 'Program.cs',
        'screen_label' => 'C# Program.cs and Console Output',
        'wide_screen' => true,
        'code_label' => 'C# Source Code',
        'output_label' => 'C# Console Output',
        'output_command' => 'dotnet run',
        'tags'  => ['C#', '.NET', 'Console Application', 'Arithmetic'],
        'code'  => <<<'CODE'
using System;

double first;
double second;

Console.Write("Enter First Num: ");
first = Convert.ToDouble(Console.ReadLine());

Console.Write("Enter second Num: ");
second = Convert.ToDouble(Console.ReadLine());

double sum = first + second;
double difference = first - second;
double product = first * second;
double quotient = first / second;

Console.WriteLine("CALCULATION RESULTS");
Console.WriteLine("SUM = " + sum);
Console.WriteLine("DIFFERENCE = " + difference);
Console.WriteLine("PRODUCT = " + product);
Console.WriteLine("QUOTIENT = " + quotient);
CODE,
        'output' => <<<'OUT'
Enter First Num: 10
Enter second Num: 5
CALCULATION RESULTS
SUM = 15
DIFFERENCE = 5
PRODUCT = 50
QUOTIENT = 2
OUT,
    ],

    'auth' => [
        'num'   => 'PROJECT 04',
        'title' => 'Java Swing Login and Registration System',
        'desc'  => 'A Java Swing desktop application with login and sign-up screens, credential checks, password visibility, and message dialogs.',
        'img'   => 'images/auth-login.png',
        'screen_label' => 'Java Swing Login & Signup Screenshots',
        'screenshots' => [
            ['label' => 'Login window', 'img' => 'images/auth-login.png'],
            ['label' => 'Login success message', 'img' => 'images/auth-login-success.png'],
            ['label' => 'Sign-up window', 'img' => 'images/auth-signup.png'],
            ['label' => 'Sign-up success message', 'img' => 'images/auth-signup-success.png'],
        ],
        'file'  => 'Login.java',
        'tags'  => ['Java Swing', 'GUI Development', 'Login & Registration', 'Password Visibility', 'Event Handling'],
        'code'  => <<<'CODE'
private void logActionPerformed(java.awt.event.ActionEvent evt) {
    String user = username.getText();
    String pass = String.valueOf(password.getPassword());

    if (user.isEmpty() || pass.isEmpty()) {
        JOptionPane.showMessageDialog(this, "OOPS BAWAL YAN!");
    } else if (user.equals(savedUsername) && pass.equals(savedPass)) {
        JOptionPane.showMessageDialog(this, "YUN, PASOK!");
        Dashboard dash = new Dashboard();
        dash.show();
        this.dispose();
    } else {
        JOptionPane.showMessageDialog(this, "ERROR!");
    }
}

private void sign2ActionPerformed(java.awt.event.ActionEvent evt) {
    Signup sign = new Signup();
    sign.show();
    this.dispose();
}

private void jCheckBox1ActionPerformed(java.awt.event.ActionEvent evt) {
    if (jCheckBox1.isSelected()) {
        password.setEchoChar((char) 0);
    } else {
        password.setEchoChar('*');
    }
}
CODE,
        'output' => <<<'OUT'
LOGIN
Enter the saved username and password.
If the credentials match, show "YUN, PASOK!" and open the Dashboard.
If either field is empty, show "OOPS BAWAL YAN!".
If the credentials do not match, show "ERROR!".

SIGN-UP
Open the Signup window from the login screen.
Show a success message after registration.
OUT,
        'output_label' => 'Login & Signup Interaction',
        'output_command' => 'Java Swing GUI',
    ],

    'sports' => [
        'num'   => 'PROJECT 05',
        'title' => 'Sports Training Academy',
        'desc'  => 'A Java console application for athlete registration and login, role-based dashboards, roster viewing, training-session enrollment, and payment processing.',
        'img'   => 'images/sports-menu.png',
        'screen_label' => 'Sports Training Academy Screenshots',
        'screenshots' => [
            ['label' => 'Main menu', 'img' => 'images/sports-menu.png'],
            ['label' => 'Athlete signup', 'img' => 'images/sports-signup.png'],
            ['label' => 'Login and athlete dashboard', 'img' => 'images/sports-login-dashboard.png'],
            ['label' => 'Roster and session enrollment', 'img' => 'images/sports-roster-enrollment.png'],
            ['label' => 'Available training sessions', 'img' => 'images/sports-session-list.png'],
            ['label' => 'Session payment flow', 'img' => 'images/sports-payment.png'],
            ['label' => 'Payment receipt and athlete profile', 'img' => 'images/sports-receipt-profile.png'],
        ],
        'file'  => 'SportsTrainingAcademy.java',
        'tags'  => ['Java', 'Console Application', 'Authentication', 'Athlete Registration', 'Session Enrollment', 'Payment Processing'],
        'code_label' => 'SportsTrainingAcademy.java Source Screenshot',
        'code_image' => 'images/sports-source-code.png',
        'output_label' => 'Application Flow',
        'output_command' => 'Java Console Application',
        'output' => <<<'OUT'
SPORTS TRAINING ACADEMY
1. Login
2. Sign Up
3. Exit System

Athletes can register or log in, view the roster, enroll in a training session,
and view their profile. The screenshots also show session payment and receipt flows.
OUT,
    ],

    'petcare' => [
'num'   => 'PROJECT 06',
'title' => 'PetCare Plus Management System',
'desc'  => 'A PHP web application for veterinary and grooming services, with customer pet profiles, appointment reservations, staff dashboards, payment verification, and reservation management.',
'img'   => 'images/petcare-home.png',
'screen_label' => 'PetCare Plus Application Screenshots',
'screenshots' => [
    ['label' => 'Services homepage', 'img' => 'images/petcare-home.png'],
    ['label' => 'Staff dashboard', 'img' => 'images/petcare-staff-dashboard.png'],
    ['label' => 'Clinic appointments and patient roster', 'img' => 'images/petcare-appointments.png'],
    ['label' => 'Customer dashboard', 'img' => 'images/petcare-customer-dashboard.png'],
],
'file'  => 'PetCare booking page',
'tags'  => ['PHP', 'MySQL', 'Veterinary Services', 'Appointment Booking', 'Role-Based Dashboards', 'Payment Verification'],
'code_label' => 'PetCare PHP Source Code Screenshot',
'code_image' => 'images/petcare-code.png',
'output_label' => 'Application Features',
'output_command' => 'PHP and MySQL Web Application',
'output' => <<<'OUT'
CUSTOMER
Manage pet profiles, browse services, book appointments, and review reservations.

STAFF
Manage appointments, patient records, schedules, and payment verification.

The supplied source screenshot shows the customer booking flow and database queries.
OUT,
    ],

    'media' => [
        'num'   => 'PROJECT 06',
        'title' => 'HTML Media',
        'desc'  => 'A simple HTML and CSS media page demonstrating embedded video and audio players, plug-ins, and a YouTube section.',
        'img'   => 'images/html-media-video.png',
        'screen_label' => 'HTML Media Page Screenshots',
        'screenshots' => [
            ['label' => 'HTML video section', 'img' => 'images/html-media-video.png'],
            ['label' => 'HTML audio and plug-ins sections', 'img' => 'images/html-media-audio.png'],
        ],
        'file'  => 'HTML Media page',
        'tags'  => ['HTML', 'CSS', 'Video Element', 'Audio Element', 'Embedded Media'],
        'code_label' => 'HTML Media Source Code Screenshot',
        'code_image' => 'images/html-media-code.png',
        'output_label' => 'Page Features',
        'output_command' => 'HTML and CSS',
        'output' => <<<'OUT'
VIDEO
Displays an embedded video in the HTML Media page.

AUDIO
Provides separate audio players for Asap and Supernatural.

PLUG-INS
Includes an embedded web page in the plug-ins section.
OUT,
    ],

    'screentime' => [
        'num'   => 'PROJECT 07',
        'title' => 'Screen Time',
        'desc'  => 'A streaming and entertainment mobile app prototype for discovering titles, viewing show details, and managing a personal profile and watchlist.',
        'img'   => 'images/screentime-splash.png',
        'screen_label' => 'Screen Time Prototype Screens',
        'screenshots' => [
            ['label' => 'App splash screen', 'img' => 'images/screentime-splash.png'],
            ['label' => 'Home and featured titles', 'img' => 'images/screentime-home.png'],
            ['label' => 'Show details and reviews', 'img' => 'images/screentime-detail.png'],
            ['label' => 'User profile and watch history', 'img' => 'images/screentime-profile.png'],
        ],
        'file'  => 'Screen Time mobile app prototype',
        'tags'  => ['Mobile App Prototype', 'Streaming UI', 'Content Discovery', 'Watchlist', 'User Profile'],
        'code_label' => 'Figma Prototype',
        'prototype_url' => 'https://www.figma.com/proto/wzkKA5yGVWkS0YVukad2x1/HCI?node-id=86-121&p=f&t=I2jFgyUjUEWNkyhB-0&scaling=scale-down&content-scaling=fixed&page-id=0%3A1&starting-point-node-id=86%3A121&show-proto-sidebar=1',
        'output_label' => 'Prototype Features',
        'output_command' => 'Screen Time',
        'output' => <<<'OUT'
Browse featured movies and series.
View show information, episodes, ratings, and reviews.
Add titles to a list and manage a personal profile.
OUT,
    ],

    'quizrush' => [
        'num'   => 'PROJECT 08',
        'title' => 'QuizRush',
        'desc'  => 'A general knowledge quiz app with category-based questions, multiple-choice answers, and score tracking.',
        'img'   => 'images/quizrush-splash.png',
        'screen_label' => 'QuizRush App Screenshots',
        'screenshots' => [
            ['label' => 'QuizRush loading screen', 'img' => 'images/quizrush-splash.png'],
            ['label' => 'Science multiple-choice question', 'img' => 'images/quizrush-question.png'],
        ],
        'file'  => 'Question.java',
        'tags'  => ['Android', 'Java', 'Quiz App', 'Multiple Choice', 'Score Tracking'],
        'code_label' => 'Java Question and Answer Logic',
        'code'  => <<<'CODE'
// 1. Create a question
Question q1 = new Question(
    "What is the capital of France?",
    "Geography",
    new String[]{"Berlin", "Madrid", "Paris", "Rome"},
    2 // Paris is index 2
);

// 2. Put text onto the screen
tvQuestionText.setText(q1.getQuestionText());
btnOption1.setText(q1.getOptions()[0]);
btnOption2.setText(q1.getOptions()[1]);
btnOption3.setText(q1.getOptions()[2]);
btnOption4.setText(q1.getOptions()[3]);

// 3. Check if user clicked the right answer
if (userClickedIndex == q1.getCorrectOptionIndex()) {
    currentScore++; // Correct!
}
CODE,
        'output_label' => 'Quiz Features',
        'output_command' => 'QuizRush',
        'output' => <<<'OUT'
Choose a question category.
Read a question and select one of four answers.
Correct answers increase the current score.
OUT,
    ],

    'grade' => [
        'num'   => 'PROJECT 04',
        'title' => 'Simple Grade Calculator Console',
        'desc'  => 'A basic Java console program that inputs student subject scores, computes overall weighted averages, and determines academic standing.',
        'img'   => 'https://placehold.co/800x450/0F172A/FBBF24?text=Terminal+Run:+Grade+Evaluation+App',
        'file'  => 'GradeCalculator.java',
        'tags'  => ['Java', 'User Input', 'Conditional Logic', 'Average Calculation'],
        'code'  => <<<'CODE'
import java.util.Scanner;

public class GradeCalculator {
    public static void main(String[] args) {
        Scanner sc = new Scanner(System.in);
        System.out.print("Enter Student Name: ");
        String name = sc.nextLine();
        
        double sum = 0;
        int subjects = 4;
        String[] subNames = {"Programming", "Networking", "Database", "Math"};
        
        for (int i = 0; i < subjects; i++) {
            System.out.print("Enter grade for " + subNames[i] + ": ");
            sum += sc.nextDouble();
        }
        
        double avg = sum / subjects;
        System.out.println("\n=== ACADEMIC SUMMARY FOR " + name.toUpperCase() + " ===");
        System.out.printf("Average Grade: %.2f\n", avg);
        System.out.println("Remarks: " + (avg >= 75 ? "PASSED" : "FAILED"));
    }
}
CODE,
        'output' => <<<'OUT'
Enter Student Name: Aira Villanueva
Enter grade for Programming: 92
Enter grade for Networking: 88
Enter grade for Database: 90
Enter grade for Math: 85

=== ACADEMIC SUMMARY FOR AIRA VILLANUEVA ===
Average Grade: 88.75
Remarks: PASSED
[Process terminated successfully]
OUT,
    ],
];

/* ---------- Creative Works videos ---------- */
$videos = [
    ['src' => 'videos/creative-works/chaeyong.mp4'],
    ['src' => 'videos/creative-works/kungsinoman.mp4'],
    ['src' => 'videos/creative-works/tzuyu.mp4'],
];

/* ---------- Modal tabs ---------- */
$tabs = [
    'screen' => ['icon' => 'fa-desktop',  'label' => 'Terminal Screenshot'],
    'code'   => ['icon' => 'fa-code',     'label' => 'Code Snippet'],
    'output' => ['icon' => 'fa-terminal', 'label' => 'Execution Output'],
];
