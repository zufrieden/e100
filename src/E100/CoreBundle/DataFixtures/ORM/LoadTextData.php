<?php
namespace E100\CoreBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\AbstractFixture;
use E100\CoreBundle\Entity\Text;

class LoadTextData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $repository = $manager->getRepository('E100CoreBundle:Theme');

        $text = new Text();
        $text->setTitle('The first people');
        $text->setTeaserQuestion('This is a teaser question that everybody is asking for ?');
        $text->setTextNumber('1');
        $text->setBibleRef('Genesis 2,15-22');
        $text->setBibleText('Chocolate cake cotton candy gingerbread fruitcake bonbon bear claw pie lollipop chocolate bar. Sweet marzipan marshmallow. Chocolate cookie cookie soufflé cake jujubes fruitcake fruitcake. Ice cream oat cake chupa chups applicake applicake danish pastry icing pastry. Chocolate cake gummi bears tart. Jujubes dragée chocolate bar jelly beans. Jelly-o toffee croissant. Bear claw lemon drops jujubes ice cream tiramisu cookie halvah. Croissant apple pie croissant. Carrot cake gummies pastry candy canes icing biscuit candy canes cheesecake jelly beans. Gingerbread jelly-o soufflé dessert. Wafer bonbon sweet pudding gingerbread icing cake gingerbread applicake.
Halvah applicake caramels caramels cookie. Candy muffin ice cream cheesecake icing tootsie roll soufflé icing topping. Chupa chups marzipan gummi bears applicake gummies soufflé toffee wafer. Dessert powder sesame snaps liquorice apple pie sweet roll danish icing dragée. Lemon drops macaroon toffee bear claw toffee jelly beans dragée. Lemon drops muffin pie. Tiramisu applicake biscuit sweet roll wafer lollipop jelly beans cookie donut. Lemon drops tootsie roll fruitcake sweet faworki. Dragée jelly-o tootsie roll. Gummies cookie jelly-o cupcake jujubes faworki sweet apple pie. Croissant halvah soufflé biscuit candy cake powder wafer chocolate bar. Toffee jelly fruitcake jelly wafer sweet apple pie topping. Chocolate cake tart dessert wafer soufflé.');
        $text->setTheme($manager->merge($this->getReference('theme.one')));
        $text->setComment('Bear claw donut sugar plum icing. Lollipop candy apple pie sweet gingerbread. Sugar plum sesame snaps candy canes gummies soufflé. Pastry danish brownie bear claw dessert. Powder topping brownie. Bear claw lemon drops chupa chups icing carrot cake wafer pie muffin macaroon. Dessert ice cream pastry tiramisu jelly beans apple pie chocolate. Cupcake lemon drops chocolate cake toffee lemon drops gummi bears oat cake. Apple pie pudding cheesecake chocolate bar sweet biscuit. Chupa chups icing carrot cake pastry bear claw croissant faworki powder carrot cake. Pudding danish apple pie muffin soufflé. Halvah muffin bonbon croissant jujubes. Caramels chocolate cake tiramisu cookie. Cheesecake cake candy canes sugar plum caramels marshmallow pastry tootsie roll tootsie roll.');
        $text->setAuthorName('David');
        $text->setAuthorDescription('Responsable projet');
        $text->setActionText('Pray for this my son');
        $manager->persist($text);

        $text = new Text();
        $text->setTitle('The fall');
        $text->setTeaserQuestion('This is a teaser question that everybody is asking for ?');
        $text->setTextNumber('2');
        $text->setBibleRef('Genesis 3,1-13');
        $text->setBibleText('Chocolate cake cotton candy gingerbread fruitcake bonbon bear claw pie lollipop chocolate bar. Sweet marzipan marshmallow. Chocolate cookie cookie soufflé cake jujubes fruitcake fruitcake. Ice cream oat cake chupa chups applicake applicake danish pastry icing pastry. Chocolate cake gummi bears tart. Jujubes dragée chocolate bar jelly beans. Jelly-o toffee croissant. Bear claw lemon drops jujubes ice cream tiramisu cookie halvah. Croissant apple pie croissant. Carrot cake gummies pastry candy canes icing biscuit candy canes cheesecake jelly beans. Gingerbread jelly-o soufflé dessert. Wafer bonbon sweet pudding gingerbread icing cake gingerbread applicake.
        Halvah applicake caramels caramels cookie. Candy muffin ice cream cheesecake icing tootsie roll soufflé icing topping. Chupa chups marzipan gummi bears applicake gummies soufflé toffee wafer. Dessert powder sesame snaps liquorice apple pie sweet roll danish icing dragée. Lemon drops macaroon toffee bear claw toffee jelly beans dragée. Lemon drops muffin pie. Tiramisu applicake biscuit sweet roll wafer lollipop jelly beans cookie donut. Lemon drops tootsie roll fruitcake sweet faworki. Dragée jelly-o tootsie roll. Gummies cookie jelly-o cupcake jujubes faworki sweet apple pie. Croissant halvah soufflé biscuit candy cake powder wafer chocolate bar. Toffee jelly fruitcake jelly wafer sweet apple pie topping. Chocolate cake tart dessert wafer soufflé.');
        $text->setTheme($manager->merge($this->getReference('theme.one')));
        $text->setComment('Bear claw donut sugar plum icing. Lollipop candy apple pie sweet gingerbread. Sugar plum sesame snaps candy canes gummies soufflé. Pastry danish brownie bear claw dessert. Powder topping brownie. Bear claw lemon drops chupa chups icing carrot cake wafer pie muffin macaroon. Dessert ice cream pastry tiramisu jelly beans apple pie chocolate. Cupcake lemon drops chocolate cake toffee lemon drops gummi bears oat cake. Apple pie pudding cheesecake chocolate bar sweet biscuit. Chupa chups icing carrot cake pastry bear claw croissant faworki powder carrot cake. Pudding danish apple pie muffin soufflé. Halvah muffin bonbon croissant jujubes. Caramels chocolate cake tiramisu cookie. Cheesecake cake candy canes sugar plum caramels marshmallow pastry tootsie roll tootsie roll.');
        $text->setAuthorName('David');
        $text->setAuthorDescription('Responsable projet');
        $text->setActionText('Pray for this my son');
        $manager->persist($text);

        $text = new Text();
        $text->setTitle('The flood');
        $text->setTeaserQuestion('This is a teaser question that everybody is asking for ?');
        $text->setTextNumber('3');
        $text->setBibleRef('Genesis 6,17-7,5');
        $text->setBibleText('Chocolate cake cotton candy gingerbread fruitcake bonbon bear claw pie lollipop chocolate bar. Sweet marzipan marshmallow. Chocolate cookie cookie soufflé cake jujubes fruitcake fruitcake. Ice cream oat cake chupa chups applicake applicake danish pastry icing pastry. Chocolate cake gummi bears tart. Jujubes dragée chocolate bar jelly beans. Jelly-o toffee croissant. Bear claw lemon drops jujubes ice cream tiramisu cookie halvah. Croissant apple pie croissant. Carrot cake gummies pastry candy canes icing biscuit candy canes cheesecake jelly beans. Gingerbread jelly-o soufflé dessert. Wafer bonbon sweet pudding gingerbread icing cake gingerbread applicake.
        Halvah applicake caramels caramels cookie. Candy muffin ice cream cheesecake icing tootsie roll soufflé icing topping. Chupa chups marzipan gummi bears applicake gummies soufflé toffee wafer. Dessert powder sesame snaps liquorice apple pie sweet roll danish icing dragée. Lemon drops macaroon toffee bear claw toffee jelly beans dragée. Lemon drops muffin pie. Tiramisu applicake biscuit sweet roll wafer lollipop jelly beans cookie donut. Lemon drops tootsie roll fruitcake sweet faworki. Dragée jelly-o tootsie roll. Gummies cookie jelly-o cupcake jujubes faworki sweet apple pie. Croissant halvah soufflé biscuit candy cake powder wafer chocolate bar. Toffee jelly fruitcake jelly wafer sweet apple pie topping. Chocolate cake tart dessert wafer soufflé.');
        $text->setTheme($manager->merge($this->getReference('theme.one')));
        $text->setComment('Bear claw donut sugar plum icing. Lollipop candy apple pie sweet gingerbread. Sugar plum sesame snaps candy canes gummies soufflé. Pastry danish brownie bear claw dessert. Powder topping brownie. Bear claw lemon drops chupa chups icing carrot cake wafer pie muffin macaroon. Dessert ice cream pastry tiramisu jelly beans apple pie chocolate. Cupcake lemon drops chocolate cake toffee lemon drops gummi bears oat cake. Apple pie pudding cheesecake chocolate bar sweet biscuit. Chupa chups icing carrot cake pastry bear claw croissant faworki powder carrot cake. Pudding danish apple pie muffin soufflé. Halvah muffin bonbon croissant jujubes. Caramels chocolate cake tiramisu cookie. Cheesecake cake candy canes sugar plum caramels marshmallow pastry tootsie roll tootsie roll.');
        $text->setAuthorName('David');
        $text->setAuthorDescription('Responsable projet');
        $text->setActionText('Pray for this my son');
        $manager->persist($text);

        $text = new Text();
        $text->setTitle("God's promise to Noah");
        $text->setTeaserQuestion("This is a teaser question that everybody is asking for ?");
        $text->setTextNumber("4");
        $text->setBibleRef("Genesis 9,8-17 ");
        $text->setBibleText('Chocolate cake cotton candy gingerbread fruitcake bonbon bear claw pie lollipop chocolate bar. Sweet marzipan marshmallow. Chocolate cookie cookie soufflé cake jujubes fruitcake fruitcake. Ice cream oat cake chupa chups applicake applicake danish pastry icing pastry. Chocolate cake gummi bears tart. Jujubes dragée chocolate bar jelly beans. Jelly-o toffee croissant. Bear claw lemon drops jujubes ice cream tiramisu cookie halvah. Croissant apple pie croissant. Carrot cake gummies pastry candy canes icing biscuit candy canes cheesecake jelly beans. Gingerbread jelly-o soufflé dessert. Wafer bonbon sweet pudding gingerbread icing cake gingerbread applicake.
        Halvah applicake caramels caramels cookie. Candy muffin ice cream cheesecake icing tootsie roll soufflé icing topping. Chupa chups marzipan gummi bears applicake gummies soufflé toffee wafer. Dessert powder sesame snaps liquorice apple pie sweet roll danish icing dragée. Lemon drops macaroon toffee bear claw toffee jelly beans dragée. Lemon drops muffin pie. Tiramisu applicake biscuit sweet roll wafer lollipop jelly beans cookie donut. Lemon drops tootsie roll fruitcake sweet faworki. Dragée jelly-o tootsie roll. Gummies cookie jelly-o cupcake jujubes faworki sweet apple pie. Croissant halvah soufflé biscuit candy cake powder wafer chocolate bar. Toffee jelly fruitcake jelly wafer sweet apple pie topping. Chocolate cake tart dessert wafer soufflé.');
        $text->setTheme($manager->merge($this->getReference('theme.one')));
        $text->setComment('Bear claw donut sugar plum icing. Lollipop candy apple pie sweet gingerbread. Sugar plum sesame snaps candy canes gummies soufflé. Pastry danish brownie bear claw dessert. Powder topping brownie. Bear claw lemon drops chupa chups icing carrot cake wafer pie muffin macaroon. Dessert ice cream pastry tiramisu jelly beans apple pie chocolate. Cupcake lemon drops chocolate cake toffee lemon drops gummi bears oat cake. Apple pie pudding cheesecake chocolate bar sweet biscuit. Chupa chups icing carrot cake pastry bear claw croissant faworki powder carrot cake. Pudding danish apple pie muffin soufflé. Halvah muffin bonbon croissant jujubes. Caramels chocolate cake tiramisu cookie. Cheesecake cake candy canes sugar plum caramels marshmallow pastry tootsie roll tootsie roll.');
        $text->setAuthorName('David');
        $text->setAuthorDescription('Responsable projet');
        $text->setActionText('Pray for this my son');
        $manager->persist($text);

        $text = new Text();
        $text->setTitle("The Tower of Babel");
        $text->setTeaserQuestion("This is a teaser question that everybody is asking for ?");
        $text->setTextNumber("5");
        $text->setBibleRef("Genesis 11,1-9");
        $text->setBibleText('Chocolate cake cotton candy gingerbread fruitcake bonbon bear claw pie lollipop chocolate bar. Sweet marzipan marshmallow. Chocolate cookie cookie soufflé cake jujubes fruitcake fruitcake. Ice cream oat cake chupa chups applicake applicake danish pastry icing pastry. Chocolate cake gummi bears tart. Jujubes dragée chocolate bar jelly beans. Jelly-o toffee croissant. Bear claw lemon drops jujubes ice cream tiramisu cookie halvah. Croissant apple pie croissant. Carrot cake gummies pastry candy canes icing biscuit candy canes cheesecake jelly beans. Gingerbread jelly-o soufflé dessert. Wafer bonbon sweet pudding gingerbread icing cake gingerbread applicake.
        Halvah applicake caramels caramels cookie. Candy muffin ice cream cheesecake icing tootsie roll soufflé icing topping. Chupa chups marzipan gummi bears applicake gummies soufflé toffee wafer. Dessert powder sesame snaps liquorice apple pie sweet roll danish icing dragée. Lemon drops macaroon toffee bear claw toffee jelly beans dragée. Lemon drops muffin pie. Tiramisu applicake biscuit sweet roll wafer lollipop jelly beans cookie donut. Lemon drops tootsie roll fruitcake sweet faworki. Dragée jelly-o tootsie roll. Gummies cookie jelly-o cupcake jujubes faworki sweet apple pie. Croissant halvah soufflé biscuit candy cake powder wafer chocolate bar. Toffee jelly fruitcake jelly wafer sweet apple pie topping. Chocolate cake tart dessert wafer soufflé.');
        $text->setTheme($manager->merge($this->getReference('theme.one')));
        $text->setComment('Bear claw donut sugar plum icing. Lollipop candy apple pie sweet gingerbread. Sugar plum sesame snaps candy canes gummies soufflé. Pastry danish brownie bear claw dessert. Powder topping brownie. Bear claw lemon drops chupa chups icing carrot cake wafer pie muffin macaroon. Dessert ice cream pastry tiramisu jelly beans apple pie chocolate. Cupcake lemon drops chocolate cake toffee lemon drops gummi bears oat cake. Apple pie pudding cheesecake chocolate bar sweet biscuit. Chupa chups icing carrot cake pastry bear claw croissant faworki powder carrot cake. Pudding danish apple pie muffin soufflé. Halvah muffin bonbon croissant jujubes. Caramels chocolate cake tiramisu cookie. Cheesecake cake candy canes sugar plum caramels marshmallow pastry tootsie roll tootsie roll.');
        $text->setAuthorName('David');
        $text->setAuthorDescription('Responsable projet');
        $text->setActionText('Pray for this my son');
        $manager->persist($text);

        $text = new Text();
        $text->setTitle("Time to leave");
        $text->setTeaserQuestion("This is a teaser question that everybody is asking for ?");
        $text->setTextNumber("6");
        $text->setBibleRef("Genesis 12,1-9");
        $text->setBibleText('Chocolate cake cotton candy gingerbread fruitcake bonbon bear claw pie lollipop chocolate bar. Sweet marzipan marshmallow. Chocolate cookie cookie soufflé cake jujubes fruitcake fruitcake. Ice cream oat cake chupa chups applicake applicake danish pastry icing pastry. Chocolate cake gummi bears tart. Jujubes dragée chocolate bar jelly beans. Jelly-o toffee croissant. Bear claw lemon drops jujubes ice cream tiramisu cookie halvah. Croissant apple pie croissant. Carrot cake gummies pastry candy canes icing biscuit candy canes cheesecake jelly beans. Gingerbread jelly-o soufflé dessert. Wafer bonbon sweet pudding gingerbread icing cake gingerbread applicake.
        Halvah applicake caramels caramels cookie. Candy muffin ice cream cheesecake icing tootsie roll soufflé icing topping. Chupa chups marzipan gummi bears applicake gummies soufflé toffee wafer. Dessert powder sesame snaps liquorice apple pie sweet roll danish icing dragée. Lemon drops macaroon toffee bear claw toffee jelly beans dragée. Lemon drops muffin pie. Tiramisu applicake biscuit sweet roll wafer lollipop jelly beans cookie donut. Lemon drops tootsie roll fruitcake sweet faworki. Dragée jelly-o tootsie roll. Gummies cookie jelly-o cupcake jujubes faworki sweet apple pie. Croissant halvah soufflé biscuit candy cake powder wafer chocolate bar. Toffee jelly fruitcake jelly wafer sweet apple pie topping. Chocolate cake tart dessert wafer soufflé.');
        $text->setTheme($manager->merge($this->getReference('theme.two')));
        $text->setComment('Bear claw donut sugar plum icing. Lollipop candy apple pie sweet gingerbread. Sugar plum sesame snaps candy canes gummies soufflé. Pastry danish brownie bear claw dessert. Powder topping brownie. Bear claw lemon drops chupa chups icing carrot cake wafer pie muffin macaroon. Dessert ice cream pastry tiramisu jelly beans apple pie chocolate. Cupcake lemon drops chocolate cake toffee lemon drops gummi bears oat cake. Apple pie pudding cheesecake chocolate bar sweet biscuit. Chupa chups icing carrot cake pastry bear claw croissant faworki powder carrot cake. Pudding danish apple pie muffin soufflé. Halvah muffin bonbon croissant jujubes. Caramels chocolate cake tiramisu cookie. Cheesecake cake candy canes sugar plum caramels marshmallow pastry tootsie roll tootsie roll.');
        $text->setAuthorName('David');
        $text->setAuthorDescription('Responsable projet');
        $text->setActionText('Pray for this my son');
        $manager->persist($text);

        $text = new Text();
        $text->setTitle("God's promise to Abraham");
        $text->setTeaserQuestion("This is a teaser question that everybody is asking for ?");
        $text->setTextNumber("7");
        $text->setBibleRef("Genesis 15,1-7");
        $text->setBibleText('Chocolate cake cotton candy gingerbread fruitcake bonbon bear claw pie lollipop chocolate bar. Sweet marzipan marshmallow. Chocolate cookie cookie soufflé cake jujubes fruitcake fruitcake. Ice cream oat cake chupa chups applicake applicake danish pastry icing pastry. Chocolate cake gummi bears tart. Jujubes dragée chocolate bar jelly beans. Jelly-o toffee croissant. Bear claw lemon drops jujubes ice cream tiramisu cookie halvah. Croissant apple pie croissant. Carrot cake gummies pastry candy canes icing biscuit candy canes cheesecake jelly beans. Gingerbread jelly-o soufflé dessert. Wafer bonbon sweet pudding gingerbread icing cake gingerbread applicake.
        Halvah applicake caramels caramels cookie. Candy muffin ice cream cheesecake icing tootsie roll soufflé icing topping. Chupa chups marzipan gummi bears applicake gummies soufflé toffee wafer. Dessert powder sesame snaps liquorice apple pie sweet roll danish icing dragée. Lemon drops macaroon toffee bear claw toffee jelly beans dragée. Lemon drops muffin pie. Tiramisu applicake biscuit sweet roll wafer lollipop jelly beans cookie donut. Lemon drops tootsie roll fruitcake sweet faworki. Dragée jelly-o tootsie roll. Gummies cookie jelly-o cupcake jujubes faworki sweet apple pie. Croissant halvah soufflé biscuit candy cake powder wafer chocolate bar. Toffee jelly fruitcake jelly wafer sweet apple pie topping. Chocolate cake tart dessert wafer soufflé.');
        $text->setTheme($manager->merge($this->getReference('theme.two')));
        $text->setComment('Bear claw donut sugar plum icing. Lollipop candy apple pie sweet gingerbread. Sugar plum sesame snaps candy canes gummies soufflé. Pastry danish brownie bear claw dessert. Powder topping brownie. Bear claw lemon drops chupa chups icing carrot cake wafer pie muffin macaroon. Dessert ice cream pastry tiramisu jelly beans apple pie chocolate. Cupcake lemon drops chocolate cake toffee lemon drops gummi bears oat cake. Apple pie pudding cheesecake chocolate bar sweet biscuit. Chupa chups icing carrot cake pastry bear claw croissant faworki powder carrot cake. Pudding danish apple pie muffin soufflé. Halvah muffin bonbon croissant jujubes. Caramels chocolate cake tiramisu cookie. Cheesecake cake candy canes sugar plum caramels marshmallow pastry tootsie roll tootsie roll.');
        $text->setAuthorName('David');
        $text->setAuthorDescription('Responsable projet');
        $text->setActionText('Pray for this my son');
        $manager->persist($text);

        $text = new Text();
        $text->setTitle("Keeping the promise");
        $text->setTeaserQuestion("This is a teaser question that everybody is asking for ?");
        $text->setTextNumber("8");
        $text->setBibleRef("Genesis 21,1-8");
        $text->setBibleText('Chocolate cake cotton candy gingerbread fruitcake bonbon bear claw pie lollipop chocolate bar. Sweet marzipan marshmallow. Chocolate cookie cookie soufflé cake jujubes fruitcake fruitcake. Ice cream oat cake chupa chups applicake applicake danish pastry icing pastry. Chocolate cake gummi bears tart. Jujubes dragée chocolate bar jelly beans. Jelly-o toffee croissant. Bear claw lemon drops jujubes ice cream tiramisu cookie halvah. Croissant apple pie croissant. Carrot cake gummies pastry candy canes icing biscuit candy canes cheesecake jelly beans. Gingerbread jelly-o soufflé dessert. Wafer bonbon sweet pudding gingerbread icing cake gingerbread applicake.
        Halvah applicake caramels caramels cookie. Candy muffin ice cream cheesecake icing tootsie roll soufflé icing topping. Chupa chups marzipan gummi bears applicake gummies soufflé toffee wafer. Dessert powder sesame snaps liquorice apple pie sweet roll danish icing dragée. Lemon drops macaroon toffee bear claw toffee jelly beans dragée. Lemon drops muffin pie. Tiramisu applicake biscuit sweet roll wafer lollipop jelly beans cookie donut. Lemon drops tootsie roll fruitcake sweet faworki. Dragée jelly-o tootsie roll. Gummies cookie jelly-o cupcake jujubes faworki sweet apple pie. Croissant halvah soufflé biscuit candy cake powder wafer chocolate bar. Toffee jelly fruitcake jelly wafer sweet apple pie topping. Chocolate cake tart dessert wafer soufflé.');
        $text->setTheme($manager->merge($this->getReference('theme.two')));
        $text->setComment('Bear claw donut sugar plum icing. Lollipop candy apple pie sweet gingerbread. Sugar plum sesame snaps candy canes gummies soufflé. Pastry danish brownie bear claw dessert. Powder topping brownie. Bear claw lemon drops chupa chups icing carrot cake wafer pie muffin macaroon. Dessert ice cream pastry tiramisu jelly beans apple pie chocolate. Cupcake lemon drops chocolate cake toffee lemon drops gummi bears oat cake. Apple pie pudding cheesecake chocolate bar sweet biscuit. Chupa chups icing carrot cake pastry bear claw croissant faworki powder carrot cake. Pudding danish apple pie muffin soufflé. Halvah muffin bonbon croissant jujubes. Caramels chocolate cake tiramisu cookie. Cheesecake cake candy canes sugar plum caramels marshmallow pastry tootsie roll tootsie roll.');
        $text->setAuthorName('David');
        $text->setAuthorDescription('Responsable projet');
        $text->setActionText('Pray for this my son');
        $text->setLink('<a href="http://www.youtube.com">Check this youtube video</a>');
        $manager->persist($text);

        $text = new Text();
        $text->setTitle("Not alone");
        $text->setTeaserQuestion("This is a teaser question that everybody is asking for ?");
        $text->setTextNumber("9");
        $text->setBibleRef("Genesis 28,10-16");
        $text->setBibleText('Chocolate cake cotton candy gingerbread fruitcake bonbon bear claw pie lollipop chocolate bar. Sweet marzipan marshmallow. Chocolate cookie cookie soufflé cake jujubes fruitcake fruitcake. Ice cream oat cake chupa chups applicake applicake danish pastry icing pastry. Chocolate cake gummi bears tart. Jujubes dragée chocolate bar jelly beans. Jelly-o toffee croissant. Bear claw lemon drops jujubes ice cream tiramisu cookie halvah. Croissant apple pie croissant. Carrot cake gummies pastry candy canes icing biscuit candy canes cheesecake jelly beans. Gingerbread jelly-o soufflé dessert. Wafer bonbon sweet pudding gingerbread icing cake gingerbread applicake.
        Halvah applicake caramels caramels cookie. Candy muffin ice cream cheesecake icing tootsie roll soufflé icing topping. Chupa chups marzipan gummi bears applicake gummies soufflé toffee wafer. Dessert powder sesame snaps liquorice apple pie sweet roll danish icing dragée. Lemon drops macaroon toffee bear claw toffee jelly beans dragée. Lemon drops muffin pie. Tiramisu applicake biscuit sweet roll wafer lollipop jelly beans cookie donut. Lemon drops tootsie roll fruitcake sweet faworki. Dragée jelly-o tootsie roll. Gummies cookie jelly-o cupcake jujubes faworki sweet apple pie. Croissant halvah soufflé biscuit candy cake powder wafer chocolate bar. Toffee jelly fruitcake jelly wafer sweet apple pie topping. Chocolate cake tart dessert wafer soufflé.');
        $text->setTheme($manager->merge($this->getReference('theme.two')));
        $text->setComment('Bear claw donut sugar plum icing. Lollipop candy apple pie sweet gingerbread. Sugar plum sesame snaps candy canes gummies soufflé. Pastry danish brownie bear claw dessert. Powder topping brownie. Bear claw lemon drops chupa chups icing carrot cake wafer pie muffin macaroon. Dessert ice cream pastry tiramisu jelly beans apple pie chocolate. Cupcake lemon drops chocolate cake toffee lemon drops gummi bears oat cake. Apple pie pudding cheesecake chocolate bar sweet biscuit. Chupa chups icing carrot cake pastry bear claw croissant faworki powder carrot cake. Pudding danish apple pie muffin soufflé. Halvah muffin bonbon croissant jujubes. Caramels chocolate cake tiramisu cookie. Cheesecake cake candy canes sugar plum caramels marshmallow pastry tootsie roll tootsie roll.');
        $text->setAuthorName('David');
        $text->setAuthorDescription('Responsable projet');
        $text->setActionText('Pray for this my son');
        $manager->persist($text);

        $text = new Text();
        $text->setTitle("Becoming friends");
        $text->setTeaserQuestion("This is a teaser question that everybody is asking for ?");
        $text->setTextNumber("10");
        $text->setBibleRef("Genesis 33,1-11");
        $text->setBibleText('Chocolate cake cotton candy gingerbread fruitcake bonbon bear claw pie lollipop chocolate bar. Sweet marzipan marshmallow. Chocolate cookie cookie soufflé cake jujubes fruitcake fruitcake. Ice cream oat cake chupa chups applicake applicake danish pastry icing pastry. Chocolate cake gummi bears tart. Jujubes dragée chocolate bar jelly beans. Jelly-o toffee croissant. Bear claw lemon drops jujubes ice cream tiramisu cookie halvah. Croissant apple pie croissant. Carrot cake gummies pastry candy canes icing biscuit candy canes cheesecake jelly beans. Gingerbread jelly-o soufflé dessert. Wafer bonbon sweet pudding gingerbread icing cake gingerbread applicake.
        Halvah applicake caramels caramels cookie. Candy muffin ice cream cheesecake icing tootsie roll soufflé icing topping. Chupa chups marzipan gummi bears applicake gummies soufflé toffee wafer. Dessert powder sesame snaps liquorice apple pie sweet roll danish icing dragée. Lemon drops macaroon toffee bear claw toffee jelly beans dragée. Lemon drops muffin pie. Tiramisu applicake biscuit sweet roll wafer lollipop jelly beans cookie donut. Lemon drops tootsie roll fruitcake sweet faworki. Dragée jelly-o tootsie roll. Gummies cookie jelly-o cupcake jujubes faworki sweet apple pie. Croissant halvah soufflé biscuit candy cake powder wafer chocolate bar. Toffee jelly fruitcake jelly wafer sweet apple pie topping. Chocolate cake tart dessert wafer soufflé.');
        $text->setTheme($manager->merge($this->getReference('theme.two')));
        $text->setComment('Bear claw donut sugar plum icing. Lollipop candy apple pie sweet gingerbread. Sugar plum sesame snaps candy canes gummies soufflé. Pastry danish brownie bear claw dessert. Powder topping brownie. Bear claw lemon drops chupa chups icing carrot cake wafer pie muffin macaroon. Dessert ice cream pastry tiramisu jelly beans apple pie chocolate. Cupcake lemon drops chocolate cake toffee lemon drops gummi bears oat cake. Apple pie pudding cheesecake chocolate bar sweet biscuit. Chupa chups icing carrot cake pastry bear claw croissant faworki powder carrot cake. Pudding danish apple pie muffin soufflé. Halvah muffin bonbon croissant jujubes. Caramels chocolate cake tiramisu cookie. Cheesecake cake candy canes sugar plum caramels marshmallow pastry tootsie roll tootsie roll.');
        $text->setAuthorName('David');
        $text->setAuthorDescription('Responsable projet');
        $text->setActionText('Pray for this my son');
        $manager->persist($text);

        $text = new Text();
        $text->setTitle("Sold!");
        $text->setTeaserQuestion("This is a teaser question that everybody is asking for ?");
        $text->setTextNumber("11");
        $text->setBibleRef("Genesis 37,17b-28");
        $text->setBibleText('Chocolate cake cotton candy gingerbread fruitcake bonbon bear claw pie lollipop chocolate bar. Sweet marzipan marshmallow. Chocolate cookie cookie soufflé cake jujubes fruitcake fruitcake. Ice cream oat cake chupa chups applicake applicake danish pastry icing pastry. Chocolate cake gummi bears tart. Jujubes dragée chocolate bar jelly beans. Jelly-o toffee croissant. Bear claw lemon drops jujubes ice cream tiramisu cookie halvah. Croissant apple pie croissant. Carrot cake gummies pastry candy canes icing biscuit candy canes cheesecake jelly beans. Gingerbread jelly-o soufflé dessert. Wafer bonbon sweet pudding gingerbread icing cake gingerbread applicake.
        Halvah applicake caramels caramels cookie. Candy muffin ice cream cheesecake icing tootsie roll soufflé icing topping. Chupa chups marzipan gummi bears applicake gummies soufflé toffee wafer. Dessert powder sesame snaps liquorice apple pie sweet roll danish icing dragée. Lemon drops macaroon toffee bear claw toffee jelly beans dragée. Lemon drops muffin pie. Tiramisu applicake biscuit sweet roll wafer lollipop jelly beans cookie donut. Lemon drops tootsie roll fruitcake sweet faworki. Dragée jelly-o tootsie roll. Gummies cookie jelly-o cupcake jujubes faworki sweet apple pie. Croissant halvah soufflé biscuit candy cake powder wafer chocolate bar. Toffee jelly fruitcake jelly wafer sweet apple pie topping. Chocolate cake tart dessert wafer soufflé.');
        $text->setTheme($manager->merge($this->getReference('theme.three')));
        $text->setComment('Bear claw donut sugar plum icing. Lollipop candy apple pie sweet gingerbread. Sugar plum sesame snaps candy canes gummies soufflé. Pastry danish brownie bear claw dessert. Powder topping brownie. Bear claw lemon drops chupa chups icing carrot cake wafer pie muffin macaroon. Dessert ice cream pastry tiramisu jelly beans apple pie chocolate. Cupcake lemon drops chocolate cake toffee lemon drops gummi bears oat cake. Apple pie pudding cheesecake chocolate bar sweet biscuit. Chupa chups icing carrot cake pastry bear claw croissant faworki powder carrot cake. Pudding danish apple pie muffin soufflé. Halvah muffin bonbon croissant jujubes. Caramels chocolate cake tiramisu cookie. Cheesecake cake candy canes sugar plum caramels marshmallow pastry tootsie roll tootsie roll.');
        $text->setAuthorName('David');
        $text->setAuthorDescription('Responsable projet');
        $text->setActionText('Pray for this my son');
        $manager->persist($text);

        $manager->flush();
    }

    public function getOrder()
    {
        return 2;
    }
}