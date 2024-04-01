<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use App\Models\{Book, Category, College, CollegeYear, Semester, Subject, Question, User, UserResponse};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class CollegeController extends Controller
{
    public function getPreviousAnswers($userID)
    {
        $subjects = DB::table('subjects')
            ->join('semesters', 'subjects.semester_id', '=', 'semesters.id')
            ->join('questions', 'subjects.id', '=', 'questions.subject_id')
            ->join('user_responses', 'questions.id', '=', 'user_responses.question_id')
            ->where('user_responses.user_id', '=', $userID)
            ->distinct()
            ->select('subjects.name', 'subjects.id')
            ->get();
        return response()->json(['message' => 'Success', "data" => $subjects, 'status_code' => 200,], 200);
    }

    public function submitAnswers(Request $request)
    {
        $userId = $request->userId; // Get the authenticated user's ID
        // print_r($request->answers);
        $answersData = json_decode($request->answers, true);
        foreach ($answersData as $questionId => $choiceId) {
            UserResponse::updateOrCreate(
                ['user_id' => $userId, 'question_id' => $questionId],
                ['choice_id' => $choiceId]
            );
        }

        return response()->json(['message' => 'Answers saved successfully', 'status_code' => 200], 200);
    }

    public function getColleges()
    {
        $colleges = College::all();
        return response()->json(['message' => 'Success', "data" => $colleges, 'status_code' => 200,], 200);
    }

    // Fetch years of study for a specific college
    public function getYears(College $college)
    {
        $collegeYears = $college->collegeYears; // Assuming 'years' is the relationship name in College model
        return response()->json(['message' => 'Success', "data" => $collegeYears, 'status_code' => 200,], 200);
    }

    // Fetch semesters by year of study
    public function getSemesters(CollegeYear $year)
    {
        $semesters = $year->semesters; // Assuming 'semesters' is the relationship name in CollegeYear model
        $books = Book::latest()->take(100)->get();

        return response()->json(['message' => 'Success', "semesters" => $semesters, "books" => $books, 'status_code' => 200,], 200);
    }

    // Fetch subjects through semesters
    public function getSubjects(Semester $semester)
    {
        $semester = $semester->subjects->loadCount('questions'); // Assuming 'subjects' is the relationship name in Semester model
        $category = Category::latest()->take(100)->get();
        return response()->json(['message' => 'Success', "data" => $semester, "categorys" => $category, 'status_code' => 200,], 200);
    }

    // Fetch all questions with their own choices for each subject
    public function getQuestions(Subject $subject)
    {
        $questions = $subject->questions->load('choices');

        $result = [];

        // foreach ($questions as $question) {
        //     $userResponse = UserResponse::where('user_id', $userID)
        //         ->where('question_id', $question->id)
        //         ->with('choice')
        //         ->first();

        //     if ($userResponse) {
        //         // Calculate percentage if the user has answered the question before
        //         $totalChoices = $question->choices->count();
        //         $correctChoices = $question->choices->where('is_correct', true)->count();
        //         $userChoice = $userResponse->choice;

        //         $percentage = ($userChoice->is_correct ? 1 : 0) * 100;
        //     } else {
        //         // Set a 404 value if the user has not answered the question
        //         $userResponse = null;
        //         $percentage = 404;
        //     }

        //     $result[] = [
        //         'question' => $question,
        //         // 'previous_answer' => $userResponse->choice->question_id,
        //         // 'percentage' => $percentage,
        //     ];
        // }

        return response()->json(['message' => 'Success', 'question' => $questions, 'status_code' => 200], 200);
    }

    public function getBook(Category $category)
    {
        // return $category;
        $books = $category->books; // Assuming 'questions' is the relationship in Subject model and 'choices' in Question model
        return response()->json(['message' => 'Success', "books" => $books, 'status_code' => 200,], 200);
    }


    public function searchSubject(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'keyword' => 'required|min:1',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors()->first(), 'errors' => $validator->errors(), 'status_code' => 400], 400);
        }

        $keyword = $request->keyword;

        // Execute the query and retrieve subjects
        $subjects = Subject::where(function ($query) use ($keyword) {
            $query->where('name', 'LIKE', "%{$keyword}%");
        })->get(); // Add ->get() to retrieve results

        return response()->json(['message' => 'Success', "subjects" => $subjects, 'status_code' => 200], 200);
    }
    public function searchBook(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'keyword' => 'required|min:1',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors()->first(), 'errors' => $validator->errors(), 'status_code' => 400], 400);
        }

        $keyword = $request->keyword;

        // Execute the query and retrieve subjects
        $books = Book::where(function ($query) use ($keyword) {
            $query->where('name', 'LIKE', "%{$keyword}%");
        })->get(); // Add ->get() to retrieve results

        return response()->json(['message' => 'Success', "books" => $books, 'status_code' => 200], 200);
    }
}
// app verison