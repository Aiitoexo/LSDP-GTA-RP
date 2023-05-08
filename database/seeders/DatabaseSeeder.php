<?php

namespace Database\Seeders;

use App\Models\Actions;
use App\Models\Arrest;
use App\Models\CommentProfile;
use App\Models\Offenses;
use App\Models\ProfileInMate;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $all_offenses = [
            [
                'content' => "Stationnement illégal/Genant",
                'fine' => 4320
            ],
            [
                'content' => "Conduite sans permis",
                'fine' => 2500
            ],
            [
                'content' => "Non respect règles lieu public",
                'fine' => 6480
            ],
            [
                'content' => "Conduite sur zones interdites",
                'fine' => 3600
            ],
            [
                'content' => "Utilisation abusive du klaxon",
                'fine' => 5520
            ],
            [
                'content' => "Entrave circulation de véhicules prio",
                'fine' => 10800
            ],
            [
                'content' => "Présence de piéton sur espace non autorisé",
                'fine' => 1440
            ],
            [
                'content' => "Non présentation de documents",
                'fine' => 6800
            ],
            [
                'content' => "Excès 10/50 Km/h",
                'fine' => 2800
            ],
            [
                'content' => "Excès 50/75 Km/h",
                'fine' => 3500
            ],
            [
                'content' => "Excès 75/100 Km/h",
                'fine' => 4800
            ],
            [
                'content' => "Excès sup 100 Km/h",
                'fine' => 5000
            ],
            [
                'content' => "Dégradations de biens publics",
                'fine' => 2000
            ],
            [
                'content' => "Dégradations de bien appartenant à autrui",
                'fine' => 3000
            ],
            [
                'content' => "Conduite dangereuse/Contre-sens",
                'fine' => 7200
            ],
            [
                'content' => "Conduite sans port du casque",
                'fine' => 2500
            ],
            [
                'content' => "Conduite hors route",
                'fine' => 3200
            ],
            [
                'content' => "Véhicule non conforme à la circulation",
                'fine' => 6480
            ],
            [
                'content' => "Circulation roue arrière véhicule 2 roues",
                'fine' => 3600
            ],
            [
                'content' => "Utilisation du téléphone au volant ",
                'fine' => 2000
            ],
            [
                'content' => "Vol de véhicules",
                'fine' => 10800
            ],
            [
                'content' => "Port du masque (casque y compris)",
                'fine' => 1440
            ],
            [
                'content' => "Outrage à agent public",
                'fine' => 4200
            ],
            [
                'content' => "Abus de pouvoir ",
                'fine' => 10000
            ],
            [
                'content' => "Trouble a l'ordre public",
                'fine' => 10800
            ],
            [
                'content' => "Faux témoignage",
                'fine' => 10000
            ],
            [
                'content' => "Refus d'obtempérer/Delit de Fuite",
                'fine' => 8900
            ],
            [
                'content' => "Regroupement illégal",
                'fine' => 10000
            ],
            [
                'content' => "Publicité mensongère	",
                'fine' => 36000
            ],
            [
                'content' => "Détention de faux",
                'fine' => 1500
            ],
            [
                'content' => "Injures",
                'fine' => 2500
            ],
            [
                'content' => "Atteinte à la pudeur",
                'fine' => 3600
            ],
            [
                'content' => "Dissimulation visage dans espace public",
                'fine' => 1800
            ],
            [
                'content' => "Entrave aux actions de la police ",
                'fine' => 15000
            ],
            [
                'content' => "Outrage à magistrat",
                'fine' => 7000
            ],
            [
                'content' => "Consommation drogues & alcool 0,3 à 0,4",
                'fine' => 2320
            ],
            [
                'content' => "Consommation drogues & alcool 0,4 à 0,8",
                'fine' => 3000
            ],
            [
                'content' => "Consommation drogues & alcool Plus de 0,8",
                'fine' => 3300
            ],
            [
                'content' => "Exhibition illicite d'arme",
                'fine' => 1500
            ],
            [
                'content' => "Absence de permis de d'armes",
                'fine' => 5000
            ],
            [
                'content' => "Possession arme catégorie 2",
                'fine' => 11500
            ],
            [
                'content' => "Possession arme catégorie 3",
                'fine' => 26000
            ],
            [
                'content' => "Possession arme catégorie 4",
                'fine' => 70000
            ],
            [
                'content' => "Possession arme dotée de modifications",
                'fine' => 30000
            ],
            [
                'content' => "Possession d'un fusil de précision à lunette",
                'fine' => 90000
            ],
            [
                'content' => "Menace à autrui",
                'fine' => 12600
            ],
            [
                'content' => "Menaces sur agents de l’état",
                'fine' => 25200
            ],
            [
                'content' => "Menace de mort",
                'fine' => 35000
            ],
            [
                'content' => "Intimidation",
                'fine' => 1500
            ],
            [
                'content' => "Diffamation",
                'fine' => 4000
            ],
            [
                'content' => "Extorsion",
                'fine' => 4500
            ],
            [
                'content' => "Consommation de substances",
                'fine' => 8900
            ],
            [
                'content' => "Détention stupéfiants + 0/100 pochons",
                'fine' => 3500
            ],
            [
                'content' => "Détention stupéfiants + 100/500 pochons",
                'fine' => 7000
            ],
            [
                'content' => "Détention stupéfiants + 500 pochons",
                'fine' => 11500
            ],
            [
                'content' => "Vol",
                'fine' => 24500
            ],
            [
                'content' => "Appels téléphoniques malveillants",
                'fine' => 2500
            ],
            [
                'content' => "Violation de la propriété privée/Vie Privé",
                'fine' => 5650
            ],
            [
                'content' => "Détention argent illégal + 10 000",
                'fine' => 0,
                'rule' => "montant de l'argent saisie"
            ],
            [
                'content' => "Non respect du contrat de travail",
                'fine' => 30030
            ],
            [
                'content' => "Chantage",
                'fine' => 1700
            ],
            [
                'content' => "Agression",
                'fine' => 2500
            ],
            [
                'content' => "Mise en danger de la vie d'autrui",
                'fine' => 24100
            ],
            [
                'content' => "Non-assistance à personne en danger",
                'fine' => 4320
            ],
            [
                'content' => "Harcèlement",
                'fine' => 8000
            ],
            [
                'content' => "Usurpation d'identité/Profesion",
                'fine' => 6300
            ],
            [
                'content' => "Agression aggravée",
                'fine' => 27250
            ],
            [
                'content' => "Enlèvement",
                'fine' => 15000
            ],
            [
                'content' => "Prise d'otages",
                'fine' => 10000
            ],
            [
                'content' => "Séquestration",
                'fine' => 25500
            ],
            [
                'content' => "Escroquerie",
                'fine' => 2500
            ],
            [
                'content' => "Recel",
                'fine' => 10000
            ],
            [
                'content' => "Braquage de commerce",
                'fine' => 12600
            ],
            [
                'content' => "Braquage de bijouterie",
                'fine' => 18000
            ],
            [
                'content' => "Braquage de banque",
                'fine' => 30000
            ],
            [
                'content' => "Blanchiment d'argent",
                'fine' => 0,
                'rule' => "80% somme"
            ],
            [
                'content' => "Usage de faux",
                'fine' => 16000
            ],
            [
                'content' => "Dissimulation de preuves",
                'fine' => 5000
            ],
            [
                'content' => "Évasion",
                'fine' => 10000
            ],
            [
                'content' => "Terrorisme",
                'fine' => 50000
            ],
            [
                'content' => "Corruption",
                'fine' => 36000
            ],
            [
                'content' => "Intention de vente de stupéfiants",
                'fine' => 5000
            ],
            [
                'content' => "Trafic de stupéfiants",
                'fine' => 31500
            ],
            [
                'content' => "Intention de vente d'une arme à feu",
                'fine' => 12000
            ],
            [
                'content' => "Trafic d'armes à feu",
                'fine' => 44800
            ],
            [
                'content' => "Utilisation illégale d'une arme à feu",
                'fine' => 25500
            ],
            [
                'content' => "Mutilation",
                'fine' => 25000
            ],
            [
                'content' => "Tentative d'homicide",
                'fine' => 151200
            ],
            [
                'content' => "Tentative d'homicide sur agents de l'état",
                'fine' => 302400
            ],
            [
                'content' => "Tentative d'homicide sur le gouverneur",
                'fine' => 225000
            ],
            [
                'content' => "Homicide involontaire",
                'fine' => 50400
            ],
            [
                'content' => "Homicide volontaire",
                'fine' => 200000
            ],
            [
                'content' => "Homicide volontaire sur agents de l'état",
                'fine' => 450000
            ],
            [
                'content' => "homicide  sur le gouverneur",
                'fine' => 0
            ],
            [
                'content' => "Agression sexuelle",
                'fine' => 0
            ],
            [
                'content' => "Viol",
                'fine' => 0
            ]
        ];

        $all_actions = [
            [
                'content' => 'Fourriere',
                'gav' => 30,
                'post_search' => false,
                'federal' => 0,
            ],
            [
                'content' => 'Fourriere+Interdiction passage permis 24h',
                'gav' => 10,
                'post_search' => false,
                'federal' => 0,
            ],
            [
                'content' => '',
                'gav' => 0,
                'post_search' => false,
                'federal' => 0,
            ],
            [
                'content' => '',
                'gav' => 0,
                'post_search' => true,
                'federal' => 0,
            ],
            [
                'content' => '',
                'gav' => 0,
                'post_search' => false,
                'federal' => 0,
            ],
            [
                'content' => '',
                'gav' => 0,
                'post_search' => true,
                'federal' => 0,
            ],
            [
                'content' => '',
                'gav' => 0,
                'post_search' => false,
                'federal' => 0,
            ],
            [
                'content' => 'Vérifications empreintes au poste',
                'gav' => 10,
                'post_search' => true,
                'federal' => 0,
            ],
            [
                'content' => '',
                'gav' => 0,
                'post_search' => false,
                'federal' => 0,
            ],
            [
                'content' => '',
                'gav' => 0,
                'post_search' => false,
                'federal' => 0,
            ],
            [
                'content' => 'Retrait permis + Fourrière + Interdictions conduite 24 h + Controle alcool/drogues',
                'gav' => 0,
                'post_search' => false,
                'federal' => 0,
            ],
            [
                'content' => 'Retrait permis + Fourrière + Interdictions conduite 24 h + Controle alcool/drogues',
                'gav' => 10,
                'post_search' => true,
                'federal' => 0,
            ],
            [
                'content' => '',
                'gav' => 20,
                'post_search' => true,
                'federal' => 0,
            ],
            [
                'content' => 'Frais soin victime + Réparation vehicules + 1000$',
                'gav' => 30,
                'post_search' => true,
                'federal' => 0,
            ],
            [
                'content' => 'Fourrière + Contrôle taux alcool/drogues',
                'gav' => 0,
                'post_search' => false,
                'federal' => 0,
            ],
            [
                'content' => '',
                'gav' => 0,
                'post_search' => false,
                'federal' => 0,
            ],
            [
                'content' => '',
                'gav' => 0,
                'post_search' => false,
                'federal' => 0,
            ],
            [
                'content' => 'Mise en Fourrière',
                'gav' => 0,
                'post_search' => false,
                'federal' => 0,
            ],
            [
                'content' => 'Mise en Fourrière ',
                'gav' => 0,
                'post_search' => false,
                'federal' => 0,
            ],
            [
                'content' => '',
                'gav' => 0,
                'post_search' => false,
                'federal' => 0,
            ],
            [
                'content' => 'Réparation du véhicule + Fourrière ',
                'gav' => 30,
                'post_search' => true,
                'federal' => 0,
            ],
            [
                'content' => '',
                'gav' => 0,
                'post_search' => true,
                'federal' => 0,
            ],
            [
                'content' => '',
                'gav' => 20,
                'post_search' => true,
                'federal' => 0,
            ],
            [
                'content' => '',
                'gav' => 0,
                'post_search' => true,
                'federal' => 720,
            ],
            [
                'content' => '',
                'gav' => 10,
                'post_search' => true,
                'federal' => 0,
            ],
            [
                'content' => '',
                'gav' => 30,
                'post_search' => true,
                'federal' => 0,
            ],
            [
                'content' => 'Mise en fourrière',
                'gav' => 10,
                'post_search' => true,
                'federal' => 0,
            ],
            [
                'content' => '',
                'gav' => 20,
                'post_search' => true,
                'federal' => 0,
            ],
            [
                'content' => 'Mise en examins de l\'entreprise',
                'gav' => 20,
                'post_search' => false,
                'federal' => 0,
            ],
            [
                'content' => '',
                'gav' => 60,
                'post_search' => true,
                'federal' => 0,
            ],
            [
                'content' => '',
                'gav' => 5,
                'post_search' => false,
                'federal' => 0,
            ],
            [
                'content' => '',
                'gav' => 0,
                'post_search' => false,
                'federal' => 0,
            ],
            [
                'content' => '',
                'gav' => 0,
                'post_search' => true,
                'federal' => 0,
            ],
            [
                'content' => '',
                'gav' => 30,
                'post_search' => true,
                'federal' => 0,
            ],
            [
                'content' => '',
                'gav' => 40,
                'post_search' => true,
                'federal' => 0,
            ],
            [
                'content' => '',
                'gav' => 10,
                'post_search' => true,
                'federal' => 0,
            ],
            [
                'content' => '',
                'gav' => 15,
                'post_search' => true,
                'federal' => 0,
            ],
            [
                'content' => '',
                'gav' => 20,
                'post_search' => true,
                'federal' => 0,
            ],
            [
                'content' => '',
                'gav' => 45,
                'post_search' => true,
                'federal' => 0,
            ],
            [
                'content' => 'Saisie des armes à feu',
                'gav' => 60,
                'post_search' => true,
                'federal' => 0,
            ],
            [
                'content' => 'Saisie des armes à feu',
                'gav' => 30,
                'post_search' => true,
                'federal' => 0,
            ],
            [
                'content' => 'Saisie des armes à feu',
                'gav' => 0,
                'post_search' => true,
                'federal' => 720,
            ],
            [
                'content' => 'Saisie des armes à feu',
                'gav' => 0,
                'post_search' => true,
                'federal' => 720,
            ],
            [
                'content' => 'Saisie des armes à feu',
                'gav' => 0,
                'post_search' => true,
                'federal' => 720,
            ],
            [
                'content' => 'Saisie des armes à feu',
                'gav' => 0,
                'post_search' => true,
                'federal' => 720,
            ],
            [
                'content' => '',
                'gav' => 20,
                'post_search' => true,
                'federal' => 0,
            ],
            [
                'content' => '',
                'gav' => 20,
                'post_search' => true,
                'federal' => 0,
            ],
            [
                'content' => '',
                'gav' => 45,
                'post_search' => true,
                'federal' => 0,
            ],
            [
                'content' => '',
                'gav' => 20,
                'post_search' => true,
                'federal' => 0,
            ],
            [
                'content' => '',
                'gav' => 30,
                'post_search' => true,
                'federal' => 0,
            ],
            [
                'content' => '',
                'gav' => 30,
                'post_search' => true,
                'federal' => 0,
            ],
            [
                'content' => 'Suivi médicale demander pour stopper la consommations',
                'gav' => 15,
                'post_search' => true,
                'federal' => 0,
            ],
            [
                'content' => 'Saisie des drogues',
                'gav' => 15,
                'post_search' => true,
                'federal' => 0,
            ],
            [
                'content' => 'Saisie des drogues',
                'gav' => 25,
                'post_search' => true,
                'federal' => 0,
            ],
            [
                'content' => 'Saisie des drogues',
                'gav' => 35,
                'post_search' => true,
                'federal' => 0,
            ],
            [
                'content' => 'Remboursemnt ',
                'gav' => 60,
                'post_search' => true,
                'federal' => 0,
            ],
            [
                'content' => 'Frais des soin pshycologique',
                'gav' => 20,
                'post_search' => true,
                'federal' => 0,
            ],
            [
                'content' => '',
                'gav' => 30,
                'post_search' => true,
                'federal' => 0,
            ],
            [
                'content' => 'Saisie de l\'argent sale',
                'gav' => 40,
                'post_search' => true,
                'federal' => 0,
            ],
            [
                'content' => '',
                'gav' => 15,
                'post_search' => true,
                'federal' => 0,
            ],
            [
                'content' => '',
                'gav' => 45,
                'post_search' => true,
                'federal' => 0,
            ],
            [
                'content' => 'Frais de soins médicaux',
                'gav' => 60,
                'post_search' => true,
                'federal' => 0,
            ],
            [
                'content' => '',
                'gav' => 30,
                'post_search' => true,
                'federal' => 0,
            ],
            [
                'content' => '',
                'gav' => 40,
                'post_search' => true,
                'federal' => 0,
            ],
            [
                'content' => 'Frais de soins pshycologique',
                'gav' => 0,
                'post_search' => true,
                'federal' => 180,
            ],
            [
                'content' => '',
                'gav' => 30,
                'post_search' => true,
                'federal' => 0,
            ],
            [
                'content' => 'Frais de soins médicaux + Frais de dédommagement',
                'gav' => 60,
                'post_search' => true,
                'federal' => 0,
            ],
            [
                'content' => 'Frais de soins médicaux + Frais de dédommagement',
                'gav' => 0,
                'post_search' => true,
                'federal' => 360,
            ],
            [
                'content' => 'Frais de soins médicaux + Frais de dédommagement',
                'gav' => 0,
                'post_search' => true,
                'federal' => 240,
            ],
            [
                'content' => 'Frais de soins médicaux + Frais de dédommagement',
                'gav' => 0,
                'post_search' => true,
                'federal' => 480,
            ],
            [
                'content' => '',
                'gav' => 30,
                'post_search' => true,
                'federal' => 0,
            ],
            [
                'content' => 'Remboursements',
                'gav' => 60,
                'post_search' => true,
                'federal' => 0,
            ],
            [
                'content' => '',
                'gav' => 20,
                'post_search' => true,
                'federal' => 0,
            ],
            [
                'content' => '',
                'gav' => 0,
                'post_search' => true,
                'federal' => 1440,
            ],
            [
                'content' => '',
                'gav' => 0,
                'post_search' => true,
                'federal' => 1440,
            ],
            [
                'content' => 'Saisie de l\'argent',
                'gav' => 0,
                'post_search' => true,
                'federal' => 180,
            ],
            [
                'content' => '',
                'gav' => 30,
                'post_search' => true,
                'federal' => 0,
            ],
            [
                'content' => '',
                'gav' => 60,
                'post_search' => true,
                'federal' => 0,
            ],
            [
                'content' => '',
                'gav' => 0,
                'post_search' => true,
                'federal' => 0,
            ],
            [
                'content' => '',
                'gav' => 720,
                'post_search' => true,
                'federal' => 0,
            ],
            [
                'content' => '',
                'gav' => 720,
                'post_search' => true,
                'federal' => 0,
            ],
            [
                'content' => 'Saisie des drogues',
                'gav' => 20,
                'post_search' => true,
                'federal' => 0,
            ],
            [
                'content' => 'Saisie des drogues',
                'gav' => 30,
                'post_search' => true,
                'federal' => 0,
            ],
            [
                'content' => 'Saisie des armes à feu',
                'gav' => 30,
                'post_search' => true,
                'federal' => 0,
            ],
            [
                'content' => 'Saisie des armes à feu',
                'gav' => 0,
                'post_search' => true,
                'federal' => 720,
            ],
            [
                'content' => 'Saisie des armes à feu',
                'gav' => 90,
                'post_search' => true,
                'federal' => 0,
            ],
            [
                'content' => '',
                'gav' => 0,
                'post_search' => true,
                'federal' => 720,
            ],
            [
                'content' => '',
                'gav' => 0,
                'post_search' => true,
                'federal' => 720,
            ],
            [
                'content' => '',
                'gav' => 0,
                'post_search' => true,
                'federal' => 720,
            ],
            [
                'content' => '',
                'gav' => 0,
                'post_search' => true,
                'federal' => 720,
            ],
            [
                'content' => '',
                'gav' => 0,
                'post_search' => true,
                'federal' => 720,
            ],
            [
                'content' => '',
                'gav' => 0,
                'post_search' => true,
                'federal' => 720,
            ],
            [
                'content' => '',
                'gav' => 0,
                'post_search' => true,
                'federal' => 720,
            ],
            [
                'content' => '',
                'gav' => 0,
                'post_search' => false,
                'federal' => 0,
                'federal_for_life' => true
            ],
            [
                'content' => '',
                'gav' => 0,
                'post_search' => false,
                'federal' => 0,
                'visa' => true
            ],
            [
                'content' => '',
                'gav' => 0,
                'post_search' => false,
                'federal' => 0,
                'visa' => true
            ],
        ];

        User::create([
            'name' => 'admin',
            'email' => 'admin@admin.fr',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        ]);

        User::factory(10)->create();

        foreach ($all_offenses as $key => $offense) {
            $temp = Offenses::create($offense);
            $all_actions[$key]['offense_id'] = $temp->id;
            Actions::create($all_actions[$key]);
        }

        ProfileInMate::factory(10)->create()->each(function (ProfileInMate $profile) {
            CommentProfile::factory()->count(rand(1, 5))->create([
                'profile_in_mate_id' => $profile->id
            ]);

            for ($i = 1; $i <= rand(1, 10); $i++) {
                $offense = Offenses::inRandomOrder()->first();
                $has_conviction = rand(0, 1);
                $fine_remove = $has_conviction ? 0 : rand(0, 1);

                Arrest::create([
                    'profile_in_mate_id' => $profile->id,
                    'offense_id' => $offense->id,
                    'payed' => rand(0, 1),
                    'has_conviction' => $has_conviction,
                    'created_at_conviction' => $has_conviction ? Carbon::now()->format('d/m/y') : null,
                    'fine_remove' => $fine_remove,
                ]);
            }
        });
    }
}
