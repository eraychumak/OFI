<?php

use Illuminate\Database\Seeder;

use App\User;
use App\Questionnaire;

class RequiredDataTableSeeder extends Seeder
{
    /**
     * Seeds the questionnaire with minimum 5
     * questions as part of the coursework
     *
     * @return void
     */
    public function run()
    {
      $user = User::create([
        "name" => "Edge Hill",
        "email" => "edgehill@gmail.com",
        "password" => Hash::make("password")
      ]);

      $questionnaire = $user->questionnaires()->create([
          "title" => "Questionnaire design and its use in research",
          "description" => "This survey aims to collect valuable insights into the importance of survey design in research and highlight how it impacts the quality of the answers provided by respondents, such as yourself. Your participation in this survey is entirely voluntary and all responses will be anonymous. Your response will be used for research purposes only and will not be used to identify you personally. If you have any questions or concerns about the survey, please do not hesitate to get in touch with us."
      ]);

      $question1 = $questionnaire->questions()->create([
          "body" => "What is your age range?"
      ]);

      $question1->choices()->createMany([
        ["choice" => "18 - 24"],
        ["choice" => "25 - 42"],
        ["choice" => "43 - 64"],
        ["choice" => "65+"],
      ]);

      $question2 = $questionnaire->questions()->create([
          "body" => "How frequently do you participate in questionnaires?"
      ]);

      $question2->choices()->createMany([
        ["choice" => "Rarely"],
        ["choice" => "Sometimes"],
        ["choice" => "Very often"],
        ["choice" => "This is my first questionnaire"],
      ]);

      $question3 = $questionnaire->questions()->create([
          "body" => "Have you ever encountered a poorly design questionnaire? (E.g. poor visuals, bad wording, not accurate, et-cetera)"
      ]);
      
      $question3->choices()->createMany([
        ["choice" => "Yes"],
        ["choice" => "No"],
        ["choice" => "I don't know"],
        ["choice" => "They all look the same to me"]
      ]);
      
      $question4 = $questionnaire->questions()->create([
          "body" => "How important is questionnaire design for you?"
      ]);

      $question4->choices()->createMany([
        ["choice" => "Very important"],
        ["choice" => "Important"],
        ["choice" => "Not important"],
        ["choice" => "I have no preference"]
      ]);

      $question5 = $questionnaire->questions()->create([
          "body" => "Which type of questions do you find the most useful when responding to a questionnaire?"
      ]);

      $question5->choices()->createMany([
        ["choice" => "Open-ended: where you answer with sentences and paragraphs"],
        ["choice" => "Close-ended: where you answer by selecting pre-defined answers (such as this one, e.g. multiple choices, drop-downs, and ranking things)."],
        ["choice" => "A variety of both"],
        ["choice" => "I have no preference"]
      ]);

      $question6 = $questionnaire->questions()->create([
          "body" => "How impactful do you think your answers are when you fill in a survey?"
      ]);

      $question6->choices()->createMany([
        ["choice" => "Very impactful"],
        ["choice" => "Impactful"],
        ["choice" => "Slightly impactful"],
        ["choice" => "Not impactful at all"]
      ]);

      $question7 = $questionnaire->questions()->create([
          "body" => "How much do incentives (e.g. giftcards, vouchers, discounts, cash) affect your choice to fill in a survey about topics that matter to you?"
      ]);

      $question7->choices()->createMany([
        ["choice" => "I will only do the survey if it has incentives."],
        ["choice" => "I am more likely to do the survey if it had incentives."],
        ["choice" => "The incentive is nice and slightly encourages me but I will fill in the survey anyway because the topic matters to me."],
        ["choice" => "I do not care about incentives, I will fill in the survey either way because the topic matters to me."]
      ]);
    }
}
