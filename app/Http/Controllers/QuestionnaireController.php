use Illuminate\Support\Facades\Gate;

class QuestionnaireController extends Controller
{
    public function index()
    {
        return view("questionnaire.index", ["questionnaires" => Questionnaire::all()]);
    }

}
