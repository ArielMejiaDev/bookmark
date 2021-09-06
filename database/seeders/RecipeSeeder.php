<?php

namespace Database\Seeders;

use App\Models\Recipe;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class RecipeSeeder extends Seeder
{
    public function run()
    {
        Recipe::factory()->create([
            'title' => 'Tarta de queso fácil. Receta sin horno',
            'thumbnail' => 'https://source.unsplash.com/random?tart',
            'content' => 'En un bol introducimos las dos tarrinas de crema de queso crema.
                Añadimos la mitad de la leche condensada y mezclamos con la batidora.
                El paso más complicado viene por el tema de la gelatina. Ponemos 10 g. de gelatina neutra en un bol que esté seco. De 300 ml de agua (1 vaso y medio aprox.) de agua fría. Separamos una tacita y la añadimos a la gelatina.
                Ponemos el resto del agua en un cazo al fuego hasta ebullición (o al micro directamente 2 minutos). Retiramos y vertemos el agua en el recipiente donde se había dejado la gelatina.
                Removemos hasta su completa disolución. Mezclamos con la crema de queso y el resto de la leche condesada. Batimos ligeramente toda la mezcla para que quede homogénea y sin ningún grumo.
                Montamos la nata. El mejor consejo, que todos los ingredientes estén fríos. Al contrario que en el merengue (que debe estar a temperatura ambiente) la nata debe utilizarse fría. La nata, el azúcar y el recipiente deben estar recién salidos de la nevera. Batimos el azúcar y la nata hasta que quede compacta. Os aseguro que con el truco del frío sale perfecto.
                Mezclamos la nata montada con la mezcla de queso pero de manera suave. Utilizamos mejor una espátula de madera o silicona para que no baje la nata.
                Sacamos el recipiente con la base de galleta de la nevera y echamos la crema de queso. Volvemos a introducir en la nevera unas 4 horas.'
        ]);

        Recipe::factory()->create([
            'title' => 'Natillas de leche caseras',
            'thumbnail' => 'https://source.unsplash.com/random?flan',
            'content' => 'Lo primero es preparar los ingredientes con los que vamos a aromatizar la leche. Lavamos muy bien el limón y pelamos su piel de manera fina, sin mucho blanco que luego nos amargue el postre. Abrimos la vaina de vainilla  y sacamos las semillas que reservaremos para añadir más tarde a la leche.
                Separamos un vasito de leche del total que vamos a emplear y lo reservamos. Calentamos el resto de la leche en un cazo a fuego medio casi hasta el punto de ebullición. Bajamos la temperatura y retiramos del fuego. Añadimos las semillas de vainilla, la piel del limón y por último la canela en rama partida por la mitad. Dejamos todo en reposo infusionando durante 10 minutos.
                Mezclamos la maicena en el vaso de leche tibia y juntamos sin que tenga nada de grumos, si es necesario le pasamos la minipimer. Separamos las yemas de las claras. Ponemos las yemas en un bol y batimos con el azúcar hasta que espumee. Añadimos el vaso de leche con la fécula de maíz disuelta. Volvemos a batir hasta que no queden grumos, tiene que quedar una masa homogénea. Reservamos.'
        ]);

        Recipe::factory()->create([
            'title' => 'Cómo hacer mermelada de fresas. Receta casera fácil',
            'thumbnail' => 'https://source.unsplash.com/random?jelly',
            'content' => 'Primero lavamos bien las fresas, las troceamos y les cortamos el rabito. Después las ponemos en un recipiente amplio con zumo de limón y azúcar, mezclamos bien y lo dejamos toda la noche.
                Al día siguiente, vertemos la mezcla en una olla y ponemos el fuego fuerte. Cuando empiece a hervir, bajamos el fuego a un nivel suave y lo dejamos cocinar hasta que se reduzca. De vez en cuando vamos removiendo para evitar que se pegue y eliminamos la espuma que sale en la superficie.
                Pasada una media hora de cocción, vertemos el contenido de la cazuela en tarros de cristal que estén recién limpios y secos. Cerramos los tarros y los dejamos boca abajo un día entero. Al día siguiente tenemos la mermelada lista para comer.',
        ]);

        Recipe::factory()->create([
            'title' => 'Almohadillas dulces. Postre tradicional toledano',
            'thumbnail' => 'https://source.unsplash.com/random?bread',
            'content' => 'Cuando la masa esté estirada la cortamos con un cuchillo afilado en forma de tiras rectangulares.
                Calentamos abundante aceite en una sartén y dejamos caer en su interior tres o cuatro rectángulos de masa, no más. Es mejor freír de poco en poco para que la temperatura del aceite no baje.
                Notaremos cómo la masa se hincha en contacto con el aceite caliente. Las volteamos para que se doren por ambos lados y las retiramos a un plato cubierto con papel absorbente. Repetimos la operación tantas veces como sea necesario para terminar con la masa.
                El último paso antes de terminar es rebozar las almohadillas en una mezcla de azúcar y canela molida. Esto es conveniente hacerlo cuando todavía están calientes para que el rebozado se adhiera a las almohadillas. Lo mejor es tener un plato preparado con la mezcla para que, según salen de la sartén y escurren, las podamos rebozar.
                Emplatamos y servimos recién hechas.',
        ]);

        Recipe::factory()->create([
            'title' => 'Cómo hacer dulce de leche',
            'thumbnail' => 'https://source.unsplash.com/random?caramel',
            'content' => 'Vemos como la leche irá adquiriendo un color cada vez más oscuro. En parte ayudada por el bicarbonato, concentrándose cada vez más, evaporando su agua. Es un proceso largo y sencillo que requiere una cierta dosis de paciencia para no acelerar el proceso.
                Aumentando la temperatura, ya que corremos el riesgo de que se nos quede quemada o cristalizada. Al cabo de 1 hora y media o 2 horas veremos como la leche comienza a espesar. Estará en su punto cuando al poner una porción en un plato. Pasadle una cuchara, quede la marca limpia sin que el líquido vuelva a juntarse. El punto será un poco a vuestro gusto, más o menos solidificada en función de cómo prefiráis.
                Cuando vemos que está más o menos espesa la mezcla, retiramos del fuego. Seguimos removiendo durante unos minutos hasta que el dulce comience a templarse, con este paso seguirá espesando.
                Una vez frío habrá adquirido más dureza. Con lo que tenemos que tenerlo en cuanta a la hora de decidir el punto en el que lo retiramos del fuego. Una vez listo podemos guardarlo en botes al vacío o disfrutarlo inmediatamente.',
        ]);

        Recipe::factory()->create([
            'title' => 'Crema de cacao y avellanas fácil.',
            'thumbnail' => 'https://source.unsplash.com/random?nutella',
            'content' => 'Cogemos las avellanas tostadas y las molemos en la batidora, hasta que se forme una crema o pasta grumosa, no hace falta que quede fina. Una vez estén bien molidas, añadimos al vaso el aceite de coco, el cacao en polvo, el azúcar, la leche y el extracto de vainilla.
                En casa solemos emplear cacao al 70% de cacao, pero si os gusta con más potencia en el mercado tenéis chocolates de hasta el 99%. De igual forma, si os gusta más suave, tenéis cacao en polvo del 50-55%, menos no os recomiendo.
                Lo batimos todo hasta que se cree una masa homogénea y uniforme. Lo mejor es hacerlo con un robot de cocina o batidora americana que llegue a emulsionar la mezcla, pero con la batidora también se puede hacer (aunque te quedarán grumitos).
                Dejamos reposar la masa en la nevera durante dos horas para que tenga una textura más consistente. Una vez pasado este tiempo, está lista para degustar.',
        ]);

        Recipe::factory()->create([
            'title' => 'Galletas de chocolate crujientes',
            'thumbnail' => 'https://source.unsplash.com/random?cookies',
            'content' => 'Ponemos la mantequilla en un bol y la derretimos unos segundos en el microondas. En menos de un minuto, ya vemos que comienza a derretirse. Mezclamos la mantequilla con el azúcar en un bol y comenzamos a batir hasta conseguir una crema uniforme.
                Aregamos el huevo y la esencia de vainilla a la mezcla y seguimos batiendo hasta que se integren. En otro bol mezclamos la harina con la levadura y la añadimos a la mezcla de huevo, mantequilla y azúcar. Con un cuchillo troceamos el chocolate en dados irregulares y los incorporamos a la mezcla anterior.
                Con la ayuda de un tenedor comenzamos a integrar los ingredientes secos con los líquidos. Cuando tengamos una especie de arena comenzamos a compactarlos con las manos hasta formar una bola. Cogemos pequeñas porciones, de unos 30 g. y formamos una bola con las manos.
                Achatamos la bolita y la colocamos sobre papel de horno o parafinado en una fuente de horno. Vamos haciendo lo mismo con el resto de la masa.',
        ]);

        Recipe::factory()->create([
            'title' => 'Papajotes. Dulce tradicional de Jaén',
            'thumbnail' => 'https://source.unsplash.com/random?toasts',
            'content' => 'En un bol grande, batimos el huevo. Una vez que ha quedado como si fuera para una tortilla, agregamos la leche y batimos de nuevo hasta que todo quede incorporado. Ahora es el turno de la harina, que hay que añadirla poco a poco. Echamos un poco y removemos. Repetimos la operación al menos 3 veces.
                Una vez añadida toda la harina, le ponemos la gaseosa o la cucharadita de levadura química (lo que tengamos a mano) y una pizca de sal. Removemos de nuevo hasta obtener una especie de crema espesa.
                Ponemos a calentar una sartén con abundante aceite de oliva virgen extra. Cuando esté bien caliente, con una cuchara vamos cogiendo porciones de la masa y las depositamos en el aceite. Volteamos los papajotes para que se doren por todos lados por igual.
                Cuando los papajotes estén fritos, retiramos del aceite con una espumadera, escurriendo bien el aceite. Los depositamos sobre un plato o fuente cubierto con papel absorbente para que no queden tan grasosos.
                Cuando ya los tenemos todos los papajotes dulces listos, los rebozamos en azúcar y listos para consumir. Servimos inmediatamente y, si puede ser, con una taza de chocolate caliente. ¡A disfrutar!',
        ]);

        Recipe::factory()->create([
            'title' => 'Cómo hacer torrijas de leche. Postre tradicional de Semana Santa',
            'thumbnail' => 'https://source.unsplash.com/random?toasts',
            'content' => 'El primer paso es preparar los ingredientes con los que vamos a aromatizar la leche. Lavamos muy bien el limón y pelamos su piel de manera fina, sin mucho blanco que luego nos amargue el postre. En la preparación de la leche aromatizada tenemos un ingrediente que va a marcar la diferencia, también el precio pues no es barata, las vainas de vainilla.
                Para esta receta vamos a necesitar la vaina abierta entera, no es necesario añadir el interior, es decir las semillas, estas las podemos guardar para otro postre. Mi recomendación es que las congeléis en un papel de aluminio y vayáis utilizando poco a poco dependiendo de la receta, así podéis economizar este ingrediente.
                Para sacarle el mayor provecho, cortamos los extremos, la parte más ancha de la vaina con un cuchillo, la rajamos de un extremo al otro, abriéndola como un libro. Raspamos el interior con la hoja de un cuchillo (lo mejor es abrirla bien con los dedos y rasparla con la mitad de la hoja del cuchillo), así sacaremos las semillas que vamos a guardar.
                La vaina limpia es la que vamos a añadir a la leche, además una vez aromatizada la leche, la vamos a sacar y secar. La guardaremos para otras utilizaciones. Por ejemplo para aromatizar azúcar y hacer nuestro propio azúcar avainillado. Calentamos la leche a fuego medio casi hasta el punto de ebullición. Bajamos la temperatura y retiramos del fuego, añadimos la vaina de la vainilla, la piel del limón y por último la rama de canela.',
        ]);

        Recipe::factory()->create([
            'title' => 'Torrijas de brioche',
            'thumbnail' => 'https://source.unsplash.com/random?toasts',
            'content' => 'En una cazuela ponemos a calentar la leche, la nata el palito de canela y las pieles de medio limón y media naranja.
                    Cuando la leche comience a hervir, retiramos la cazuela del fuego. Incorporamos el azúcar y lo mezclamos para integrarlo. Dejamos que la mezcla se temple antes de continuar. Una vez que la mezcla esté templada o casi fría, la colamos. Incorporamos los huevos batidos y reservamos.
                    Cortamos el brioche en rebanadas. Estas serán de cierto grosor, no menos de 2 cm. Colocamos las rebanadas en una fuente, unas al lado de las otras.
                    Regamos el brioche con la mezcla que tenemos reservada, poco a poco, con cuidado de cubrirlas a todas. Daremos una vuelta a las rebanadas para que se impregnen por ambas caras.
                    Cubrimos con papel transparente y guardamos en el frigo durante 2 horas. Pasado este tiempo daremos una nueva vuelta a las rebanadas en el líquido que haya quedado sobrante en la fuente.',
        ]);

        Recipe::factory()->create([
            'title' => 'Pastel de manzana estilo McDonald’s',
            'thumbnail' => 'https://source.unsplash.com/random?cake',
            'content' => 'Pelamos y descorazonamos las manzanas y las cortamos en daditos pequeños, de no más de 1 cm.
                    En una sartén añadimos la mantequilla y, cuando esté derretida, incorporamos las manzanas troceadas. Añadimos también el azúcar moreno, la canela, la nuez moscada y la sal. Removemos y cocinamos durante 5 minutos.
                    Añadimos el agua a la sartén y continuamos cocinando las manzanas 5 minutos más, hasta que veamos que comienzan a ablandarse. Reservamos.
                    Extendemos la masa quebrada y preparamos las porciones de los pasteles. Cortamos la masa en rectángulos de 6 x 12 cm. Colocamos dos cucharadas de relleno en un lado de cada una de las porciones.
                    Humedecemos la masa en todo su perímetro para ayudar al sellado. Doblamos la masa sobre sí misma hasta formar un sobre. Con un tenedor sellamos los bordes y colocamos cada uno de los pasteles en una bandeja de horno, sobre un papel vegetal.
                    Con el horno previamente caliente a 200ºC, horneamos los pasteles durante unos 25 minutos, hasta que se hayan dorado. Retiramos del horno y dejamos que se templen antes de disfrutarlos.',
        ]);

        $user = User::query()->where('email', 'user@mail.com')->first();

        Recipe::factory()->create([
            'author_id' => $user->id,
            'title' => $title = 'Pudin cremoso de fresas y plátano',
            'slug' => Str::of($title)->slug()->__toString(),
            'thumbnail' => 'https://source.unsplash.com/random?pudding',
            'content' => 'En un bol grande echamos la leche, el azúcar, la maicena y la vainilla. Mezclamos muy bien con una varilla manual hasta disolver los ingredientes. Pasamos la mezcla a un cazo a fuego bajo.
                No dejamos de remover hasta que empiece a espesar. Apartamos del fuego y seguimos removiendo hasta que acabe de espesar. Separamos 100 ml. Aproximadamente de crema en un bol o cuenco.',
        ]);

        Recipe::factory()->create([
            'author_id' => $user->id,
            'title' => $title = 'Cómo hacer una mousse de chocolate',
            'slug' => Str::of($title)->slug()->__toString(),
            'thumbnail' => 'https://source.unsplash.com/random?mousse',
            'content' => 'Derretimos a baño maría el chocolate con la mantequilla. Debemos mantener la temperatura media y remover constantemente. Cuando vemos que el chocolate está casi derretido y apagamos el fuego.
                Seguimos removiendo hasta que se haya derretido totalmente el chocolate. El calor residual será suficiente para que nos quede una crema de chocolate lisa y brillante. Reservamos hasta que el chocolate se haya templado.',
        ]);

        Recipe::factory()->create([
            'author_id' => $user->id,
            'title' => $title = 'Smoothie de fresa',
            'slug' => Str::of($title)->slug()->__toString(),
            'thumbnail' => 'https://source.unsplash.com/random?strawberries',
            'content' => 'Para que esté bien fresquito nuestro batido, metemos el día antes las frutas que vamos a emplear en la nevera, así le vamos a dar un toque frío que va perfecto para estos calores.
                Preparamos todas las frutas para proceder a triturarlas. Pelamos la manzana, la descorazonamos y la troceamos. Pelamos la naranja y la dividimos en gajos. Lavamos bien las fresas, eliminamos las hojas y las troceamos. Por último mondamos los plátanos y los troceamos.
                Introducimos todas las frutas, limpias y troceadas, en el vaso de la batidora. Trituramos hasta que quede una crema sin grumos.
                Añadimos el yogur y volvemos a batir hasta que quede integrado.
                Servimos el smoothie en raciones individuales y listo para disfrutar.',
        ]);
    }
}
