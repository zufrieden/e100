<?php
namespace E100\CoreBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\AbstractFixture;

use E100\CoreBundle\Entity\Theme;

class LoadThemeData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $theme = new Theme();
        $theme->setTestament('old');
        $theme->setImage("");
        $theme->setDescription("Nous sommes au tout début de l'histoire de l'humanité. Les onze premiers chapitre de la Genèse vont poser les fondements de tous les récits qui vont suivre. Tout est dit. Après leur découverte nous saurons que Dieu est bon et que tout ce qu'il fait est bon; qu'il y a eu une entrée fracassante et incompréhensible du mal dans cette belle création; que ce mal va détruire tout ce que Dieu a fait; que la solution à ce mal ne viendra que de Dieu. Ces récits nous disent d'où vient l'homme, quel est son problème et quelle en est la résolution. Tout est dit de l'histoire du salut. Il ne reste plus qu'à la développer.");
        $theme->setTitle('Dieu crée le monde');
        $this->addReference('theme.one', $theme);
        $manager->persist($theme);

        $theme = new Theme();
        $theme->setTestament("old");
        $theme->setImage("");
        $theme->setDescription("Après les pages si sombres des débuts de l’humanité qui nous relatent tant d’épisodes douloureux, le récit de la vie des Patriarches apparaît comme une oasis de lumière. Certes, tout n’est pas rose dans la famille d’Abraham et de ses nombreux descendants. On peut même affirmer, sans crainte de se tromper, qu’ils collectionnent tous les drames que l’on peut redouter pour sa propre famille. Mais ce n’est pas là qu’il faut chercher le cœur du récit, mais bien dans la relation que Dieu désir entretenir avec les Patriarches, et dans le besoin de ces derniers de vivre dans la présence de Dieu.");
        $theme->setTitle("La famille de Dieu");
        $this->addReference('theme.two', $theme);
        $manager->persist($theme);

        $theme = new Theme();
        $theme->setTestament("old");
        $theme->setImage("");
        $theme->setDescription("Ce segment de l’histoire présente les circonstances dans lesquelles les descendants d’Abraham se sont arrachés à leur pays, pourtant promis par leur Dieu pour y résider, pour migrer en Egypte. Tout commence par dix fils de Jacob qui vendent à des marchants en route vers l’Egypte leur jeune frère Joseph aux visions complètement erronées et orgueilleuses à leurs yeux. Eloigné des siens sur une terre étrangère, il y connaîtra la servitude, la calomnie et un emprisonnement injuste, mais également les bonnes grâces de ses maîtres, l’élévation et le pouvoir. Ceux-ci reçoivent leur explication : Même dans l’humiliation, Joseph restera d’une droiture et d’une fidélité exemplaires au Dieu de ses pères qui lui donne une sagesse et une réussite remarquables.Mais pour que son père, ses frères et leurs familles le rejoignent en Egypte, il faudra une famine durable dans le Proche-Orient d’alors, contraignant les fils de Jacob a faire deux aller-retour pour chercher du blé en Egypte. Déjà difficile en soit pour eux, cette période le sera davantage encore par les rebondissements inattendus imposés par leur frère, devenu un personnage important de Pharaon.  La tension grandissante trouvera son heureux dénouement lorsque Joseph se fera connaître par ses frères et les invitera à venir en Egypte. Apprenant l’accord de leur père Jacob pour le rejoindre, nous savons déjà que toute la famille sera bientôt à nouveau réunie et que son histoire se poursuivra désormais à l’étranger. Quelle est notre attitude à l’égard de celui/celle qui, dans notre groupe (de jeunes, famille, classe, club…), est différent/e ? Comment qualifier mon attitude quand je suis éprouvé par la tentation, la calomnie ou l’humiliation ? Opportuniste ? Fidèle à Dieu et aux valeurs garantissant la vie en communauté ? En quoi ce récit biblique m’aide-t-il sur le chemin du pardon vis-à-vis de personnes qui m’ont fait du mal ?");
        $theme->setTitle("Le Bien après le Mal");
        $this->addReference('theme.three', $theme);
        $manager->persist($theme);

        $theme = new Theme();
        $theme->setTestament("old");
        $theme->setImage("");
        $theme->setDescription("L'histoire de l'humanité regorge d'hommes qui se sont imposés comme guides, conducteurs, petits pères et autre bienfaiteurs des peuples. A chaque fois ils ont poussé leur pays vers le pire et la destruction. Tous ceux-là ont été des dictateurs et des tyrans qui ont emmené des peuples vers le malheur et l'esclavage. Et puis il y a quelques hommes qui ont été choisis pour libérer un peuple de la maison de l'esclavage. Voici l'histoire du Dieu unique avec les hommes et de Moïse le guide des enfants d'Israël, peuple bien-aimé mais récalcitrant...");
        $theme->setTitle("Moïse");
        $this->addReference('theme.four', $theme);
        $manager->persist($theme);

        $theme = new Theme();
        $theme->setTestament("old");
        $theme->setImage("");
        $theme->setDescription("Le don divin d'une loi encore pertinente de nos jours, une trahison massive et un peuple qui échappe de peu à son extermination ! Puis un nouveau guide pour terminer l'exode. Et des signes et des miracles similaires à ceux de la sortie de la terre d'esclavage donnés pour entrer dans la terre promise. Un début de conquête tonitruant. A chacun de ces épisodes l'Eternel est présent d'une manière extraordinaire. A chaque fois c'est le Dieu tout-puissant qui agit, même si on voit les hommes s'agiter et faire ce qu'ils doivent... ou pas.");
        $theme->setTitle("Challenges pour le peuple de Dieu");
        $this->addReference('theme.five', $theme);
        $manager->persist($theme);

        $theme = new Theme();
        $theme->setTestament("old");
        $theme->setImage("");
        $theme->setDescription("Notre situation ayant profondément changé,  quelles nouvelles formes va prendre notre fidélité au Dieu de nos pères ? Est-ce que les douze tribus nouvellement installées en Canaan se sont posé cette question ?  La génération des conquérants, dont la foi était si intrépide et la sagesse tellement désintéressée pour répartir le territoire conquis, n’est plus en vie. Leurs descendants succombent aux compromis, emprunts et alliances avec les peuples avoisinants. C’est une grave erreur ! Celle-ci entraîne l’invasion et le dur asservissement à des nations étrangères, en guise de punition infligée par le Dieu de l’alliance. S’ensuit un appel au secours à l’Eternel qui suscite, du sein de son peuple affligé, un homme ou une femme qui se lèvera pour le libérer et le diriger ensuite (les Juges). La Bible en présente douze qui interviendront ainsi dans différents lieux et à différents moments, parfois simultanément peut-être, durant plusieurs siècles. En même temps que les tribus d’Israël peinent à s’installer en Canaan sans se perdre, les projecteurs bibliques éclairent une jeune femme étrangère.  Veuve d’un homme de Juda, exilé avec sa famille à Moab pour échapper à une famine, Ruth décide de quitter son peuple pour accompagner sa belle-mère qui rentre chez elle. S’attachant à ce nouveau peuple, elle y vivra une belle histoire, couronnée par son inscription dans la généalogie de David et de Jésus (Ruth 4,21-22 ; Matthieu 1,5) et attestée dans un livre portant son nom. A l’image du peuple d’Israël au temps des Juges, l’histoire de l’Eglise passe-t-elle aussi par des hauts et des bas ? Et qu’en est-il de ta vie chrétienne ? Détachant nos regards de nos  infidélités et inconstances, collectives et personnelles, apprenons à regarder sans cesse au Seigneur notre Dieu, pour ne compter que sur sa fidélité (cf. 2 Timothée 2,13). A ton niveau, alors que la laideur semble souvent l’emporter dans ce monde, quelles belles histoires sais-tu voir autour de toi ? Quelles sont les belles histoires que tu es en train de vivre avec d’autres ou de promouvoir autour de toi ?");
        $theme->setTitle("Les héros de Dieu");
        $this->addReference('theme.six', $theme);
        $manager->persist($theme);

        $theme = new Theme();
        $theme->setTestament("old");
        $theme->setImage("");
        $theme->setDescription("Après la période des juges en Israël, le temps des rois est arrivé. A la demande du peuple d'Israël et sur ordre de Dieu, le prophète Samuel établit pour la première fois un roi en la personne de Saül. Plus son règne avancera, plus il s'éloignera de Dieu. Dieu choisit alors, par l'intermédiaire du prophète, David comme roi pour Son Peuple. Ces textes vont nous montrer que le roi d'Israël n'est pas un roi comme les autres. Il est appelé à se soumettre à Dieu ! Cette période nous annonce aussi le roi à venir, celui en qui « tout sera accompli »: Jésus Christ. ");
        $theme->setTitle("La nation de Dieu");
        $this->addReference('theme.seven', $theme);
        $manager->persist($theme);

        $theme = new Theme();
        $theme->setTestament("old");
        $theme->setImage("");
        $theme->setDescription("Tout n'est pas simple pour le peuple de Dieu. Le grand roi David a transgressé les commandements de Dieu en ayant fait assassiné Urie le Hittite pour épouser sa femme. Salomon lui succèdera. Il construira un magnifique temple pour Dieu, mais fera aussi preuve d'infidélité. Puis de nombreux rois vont se succéder., qui souvent feront ce qui déplaît au Seigneur. Ces événements éloigneront finalement le peuple loin de Dieu. Pourtant, des lueurs de la présence de Dieu sont toujours belles et bien présentes, avec par exemple l'épisode d'Elie et les prophètes de Baal. Mais finalement, la ville de Jérusalem sera envahie, et le peuple de Dieu déporté, pour la seconde fois, à Babylone. ");
        $theme->setTitle("Problèmes!");
        $this->addReference('theme.eight', $theme);
        $manager->persist($theme);

        $theme = new Theme();
        $theme->setTestament("old");
        $theme->setImage("");
        $theme->setDescription("Avec cette série, nous entrons dans un monde particulier, celui de la poésie, de la louange, de la sagesse.  Les Psaumes sont des chants adressés à Dieu par différentes figures du peuple d’Israël, qui peuvent être très connues comme David ou même Moïse, soit par des anonymes. Ils mettent en évidence la relation intime que le croyant entretient avec son Créateur, le Dieu d’Israël. Même si les Psaumes sont l’œuvre d’êtres humains, en les méditant, on se sent particulièrement proche de Dieu, dans sa présence. Miracle de la Parole de Dieu.  Le livre des Proverbes est une collection de petites phrases pour aider les croyants à vivre en respectant la volonté de Dieu. Par-dessus tout, le croyant est invité à aimer la sagesse, qui signifie en premier lieu « craindre l’Eternel » (Proverbes 1,7). Tous les domaines de la vie sont évoqués, la famille et les relations à l’intérieur de celle-ci, les relations homme-femme, le travail, l’instruction,…  Cette série donne seulement un tout petit aperçu de ces textes d’une grande richesse. Rien n’empêche d’aller plus loin ;-)");
        $theme->setTitle("Psaumes et Proverbes ");
        $this->addReference('theme.nine', $theme);
        $manager->persist($theme);

        $theme = new Theme();
        $theme->setTestament("old");
        $theme->setImage("");
        $theme->setDescription("Rien ne va plus dans les Royaumes d’Israël et de Juda. La corruption règne en maître, l’injustice à force de loi, l’idolâtrie est la nouvelle religion du Peuple.  A l’extérieur des deux Royaumes frères, la situation n’est pas meilleure. Les grandes puissances internationales se jalousent et se disputent et, comme toujours quand les grands se battent, ce sont les petits qui trinquent. Mais dans ce décor si sombre, des voix s’élèvent. Ce sont celles des prophètes ces hommes de Dieu qui sans relâche vont menacer de jugement, réclamer le droit et annoncer la venue du Roi de justice, seul salut et seul espoir pour les hommes.");
        $theme->setTitle("Les messagers de Dieu");
        $this->addReference('theme.ten', $theme);
        $manager->persist($theme);

        $theme = new Theme();
        $theme->setTestament("new");
        $theme->setImage("");
        $theme->setDescription("Cette série porte un titre bien connu : Jésus est annoncé comme étant le Fils de Dieu. L’ensemble des évangiles veut nous mettre sur le chemin de la foi en cet Homme, comme nous, qui a été envoyé sur notre Terre par Dieu, le Créateur de toute chose. Nous sommes donc ici au cœur de la proclamation de cette Bonne Nouvelle (= Evangile). Il y a quelque chose de fou, d’incroyable serait-on tenté de dire. Cette série présente les textes qui racontent les débuts de Jésus parmi les hommes. Des débuts qui remontent même avant la création des premiers hommes (Jean 1) !  Ces récits sont d’une simplicité touchante. Le Fils de Dieu vient au monde dans une étable, un lieu de mauvaise condition. Ils évoquent aussi la réalité telle qu’elle est vraiment, sans minimiser le Mal qui se manifeste de différentes manières.  Ces récits, finalement, évoquent la joie immense d’accueillir le Sauveur du monde parmi nous. ");
        $theme->setTitle("Jésus, le Fils de Dieu");
        $this->addReference('theme.eleven', $theme);
        $manager->persist($theme);

        $theme = new Theme();
        $theme->setTestament("new");
        $theme->setImage("");
        $theme->setDescription("Jésus a grandi dans une grande discrétion. On ne sait rien ou presque de sa vie entre sa plus petite enfance et le moment où il commence son ministère. C’est à ce moment-là que nous le retrouvons.  Durant sa vie sur Terre, Jésus a beaucoup parlé, par contre il n’a rien écrit. Ca peut paraître bizarre, mais c’est comme ça. Les textes des évangiles sont des témoignages recueillis par ses disciples ou des proches. Ils ont été tellement impressionnés par ses paroles qu’ils ont décidé de les mettre par écrit pour les transmettre à d’autres. 2000 ans plus tard, nous en faisons toujours partie. Ces paroles n’ont par pris une seule ride. Elles sont toujours pertinentes et radicales pour nos vies. Elles donnent un sens à notre vie, à ma vie. Elles donnent un sens à ma manière d’être au monde, à ma manière de vivre avec celles et ceux qui m’entourent. Elles donnent un sens à ma vie de croyant. ");
        $theme->setTitle("Ce que Jésus a dit");
        $this->addReference('theme.twelve', $theme);
        $manager->persist($theme);

        $theme = new Theme();
        $theme->setTestament("new");
        $theme->setImage("");
        $theme->setDescription("Jésus nourrit une foule. Génial ! Jésus ressuscite un homme. Incroyable ! Pourtant, cette foule, demain, aura de nouveau faim. Et cet homme, dans 10 ans, dans 20 ans, mourra de nouveau et cette fois, pour toujours... Jésus ne sait-il pas cela ? Bien sûr qu'il le sait et c'est là le but de ses miracles. Il veut annoncer quelque chose de plus fou encore : un jour les hommes n'auront plus faim pour toujours et les hommes vivront pour toujours. Alors, quand nous lisons ces récits incroyables, à nous de voir ce qu'ils nous disent de vraiment, mais de VRAIMENT incroyable :-)");
        $theme->setTitle("Ce que Jésus a fait");
        $this->addReference('theme.thirteen', $theme);
        $manager->persist($theme);

        $theme = new Theme();
        $theme->setTestament("new");
        $theme->setImage("");
        $theme->setDescription("1 Corinthiens 15,14 : Si Christ n’est pas ressuscité, notre foi est vaine... Sans la mort et la résurrection du Christ, donc sans sa naissance et sa vie, le christianisme a-t-il un sens ? Aucun ! Et pourquoi ? La Bible l'affirme : malgré toute sa bonne volonté, impossible pour l'homme de réparer le mal commis. Pourtant, il n'y a pas d'autre chemin possible : le mal doit être réparé, dans l’homme, là où il a été commis. Il ne reste donc qu'une solution : que Dieu devienne homme. Pour qu'enfin un homme puisse répondre aux exigences divines. Sans ça, le christianisme n'a aucun sens. A quoi ça servirait que Jésus donne sa vie, s’il n’est que l’un d’entre nous, soumis aux mêmes défaillances que nous ? Si c'était le cas, plus aucune garantie pour nous d'être sauvés.");
        $theme->setTitle("Le plan extraordinaire de Dieu");
        $this->addReference('theme.fourteen', $theme);
        $manager->persist($theme);

        $theme = new Theme();
        $theme->setTestament("new");
        $theme->setImage("");
        $theme->setDescription("Après sa résurrection, Jésus est monté vers son Père. Les disciples se retrouvent donc seuls. Seuls vous avez dit ? Non, car Dieu leur donne l’Esprit Saint, conformément à la promesse que Jésus leur avait faite (voir Jean 14.16-17). Les premiers chrétiens ne sont donc pas voués à eux-mêmes, mais l’Esprit leur donne la puissance d’accomplir de nombreux miracles et les guide pour apporter la Bonne Nouvelle en Judée. Mais la vie n’est pas toute rose, car les chrétiens sont aussi persécutés par les Juifs. Plusieurs sont arrêtés et certains sont mêmes lapidés, comme Etienne par exemple.");
        $theme->setTitle("Les premiers chrétiens");
        $this->addReference('theme.fifteen', $theme);
        $manager->persist($theme);

        $theme = new Theme();
        $theme->setTestament("new");
        $theme->setImage("");
        $theme->setDescription("L’un des Juifs pieux qui persécute l’Église s’appelle Saul. Il est réputé dans toute la Judée parce qu’il fait beaucoup de mal aux chrétiens. Jusqu’au jour où il voit Jésus dans une vision. Il se convertit alors et reçoit le nom de Paul. La Bonne Nouvelle de l’Évangile l’a tellement touché qu’il ne peut s’empêcher de la partager autour de lui. Il entreprend plusieurs voyages missionnaires, quatre au total, pour parler de Jésus à ceux qui habitent en dehors de la Judée. Dans chaque ville, les habitants qui se convertissent se regroupent et forment ainsi les toutes premières églises.");
        $theme->setTitle("Bonne Nouvelle pour tous");
        $this->addReference('theme.sixteen', $theme);
        $manager->persist($theme);

        $theme = new Theme();
        $theme->setTestament("new");
        $theme->setImage("");
        $theme->setDescription("Tu vas découvrir une série de lettres que l'apôtre Paul adresse à différentes églises dans le monde. Elles contiennent des encouragements pour les chrétiens qui rencontrent différents types de difficultés. Paul peut lancer des mises en garde par rapport au comportement de certains membres de ces communautés. Il ne cesse également de les encourager à persévérer sur le chemin de la foi. On estime qu'elles ont été écrites dans les années 50-60 après Jésus-Christ. Paul a visité, voir parfois fondé ces églises en personne ! La question à se poser est comment comprendre ces lettres actuellement ? En tout les cas, elles nous amènent à réfléchir à plusieurs questions fondamentales pour la vie chrétienne dans le cadre communautaire.");
        $theme->setTitle("Appartenir à Dieu");
        $this->addReference('theme.seventeen', $theme);
        $manager->persist($theme);

        $theme = new Theme();
        $theme->setTestament("new");
        $theme->setImage("");
        $theme->setDescription("Paul écrit deux lettres à Timothée dans des circonstances difficiles, puisqu’elles sont envoyées soit pendant des périodes d'emprisonnement, soit juste après. La 1ère lettre contient beaucoup d’encouragements pour Timothée pour qu’il tienne bon dans l’accomplissement de son devoir de missionnaire. La 2ème lettre contient en quelque sorte ces dernières paroles. Là Paul partage son courage et sa confiance en Dieu avant sa mort. Impressionnant ! Elles ont été écrites entre 66 et 68 après Jésus-Christ. La lettre à l'église de Thessalonique quant à elle, sera envoyée par Paul suite à la visite de Timothée. Ce qui est intéressant c'est qu'elle est datée de l'an 51 après Jésus-Christ, c'est l'écrit le plus ancien du Nouveau Testament !");
        $theme->setTitle("Vivre selon la volonté de Dieu");
        $this->addReference('theme.eightteen', $theme);
        $manager->persist($theme);

        $theme = new Theme();
        $theme->setTestament("new");
        $theme->setImage("");
        $theme->setDescription("Nous poursuivons la découverte de la vie des premiers chrétiens à travers des lettres qui sont adressées à des églises naissantes par des figures marquantes, Paul, Pierre, Jean. Et en lisant attentivement ces lettres on se rend compte que l’amour est au centre des préoccupations et des difficultés rencontrées.  Le challenge pour être un disciple fidèle porte toujours le même nom aujourd’hui : aimer.  Suivre le Christ signifie dpmc aimer. Tout « simplement ». Les guillemets sont nécessaires car on se rend compte que le fait d’aimer Dieu et son prochain sont des attitudes qui ne sont justement pas simples à vivre.   Nous sommes appelés à être des hommes, des femmes qui donnent et reçoivent de l’amour. La spécificité chrétienne vient du fait que cet amour est dirigé envers tout le monde. Nous ne sommes pas appelés à aimer uniquement les personnes qui composent notre cercle de potes !");
        $theme->setTitle("Suivre Jésus");
        $this->addReference('theme.nineteen', $theme);
        $manager->persist($theme);

        $theme = new Theme();
        $theme->setTestament("new");
        $theme->setImage("");
        $theme->setDescription("Un livre pas facile à lire et à comprendre et pourtant quel message fascinant et positif. En peu de mots, le résumé pourrait être que Dieu va vaincre définitivement le mal. Il y a une solution à ce mystère du mal qui perturbe et pervertit nos relations, nos vies et le monde en général. Ce mal, même s'il paraît victorieux depuis le début de l'humanité, même s'il détruit encore détruire sur son passage n'est pas sans solution ; il n'est pas non plus sans fin. C'est dans cette réalité que se fonde notre espérance nécessaire à la vie de tous les jours. Il est possible déjà de vivre les prémices de cette victoire finale. Il est déjà possible de vivre partiellement cette fin de l'histoire du salut.");
        $theme->setTitle("Avec Dieu, pour toujours!");
        $this->addReference('theme.twenty', $theme);
        $manager->persist($theme);

        $manager->flush();
    }

    public function getOrder()
    {
        return 1;
    }
}