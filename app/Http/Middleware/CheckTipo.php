namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CheckTipo
{
    public function handle(Request $request, Closure $next, ...$tipos): Response
    {
        $user = Auth::user();

        if (!$user || !in_array($user->tipo, $tipos)) {
            abort(403, 'Acesso negado.');
        }

        return $next($request);
    }
}
