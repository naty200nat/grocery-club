namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Operation extends Model
{
    protected $fillable = [
        'user_id',
        'type',
        'reason',
        'amount',
    ];

    // Relación con el usuario (opcional)
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
