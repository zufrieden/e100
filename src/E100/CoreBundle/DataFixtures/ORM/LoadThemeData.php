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
        $theme->setTitle('God makes the world');
        $this->addReference('theme.one', $theme);
        $manager->persist($theme);

        $theme = new Theme();
        $theme->setTestament("old");
        $theme->setImage("");
        $theme->setTitle("God's family");
        $this->addReference('theme.two', $theme);
        $manager->persist($theme);

        $theme = new Theme();
        $theme->setTestament("old");
        $theme->setImage("");
        $theme->setTitle("Good out of bad");
        $this->addReference('theme.three', $theme);
        $manager->persist($theme);

        $theme = new Theme();
        $theme->setTestament("old");
        $theme->setImage("");
        $theme->setTitle("Moses");
        $this->addReference('theme.four', $theme);
        $manager->persist($theme);

        $theme = new Theme();
        $theme->setTestament("old");
        $theme->setImage("");
        $theme->setTitle("Challenge 5 God's people");
        $this->addReference('theme.five', $theme);
        $manager->persist($theme);

        $theme = new Theme();
        $theme->setTestament("old");
        $theme->setImage("");
        $theme->setTitle("God's heroes");
        $this->addReference('theme.six', $theme);
        $manager->persist($theme);

        $theme = new Theme();
        $theme->setTestament("old");
        $theme->setImage("");
        $theme->setTitle("God's nation");
        $this->addReference('theme.seven', $theme);
        $manager->persist($theme);

        $theme = new Theme();
        $theme->setTestament("old");
        $theme->setImage("");
        $theme->setTitle("Trouble!");
        $this->addReference('theme.eight', $theme);
        $manager->persist($theme);

        $theme = new Theme();
        $theme->setTestament("old");
        $theme->setImage("");
        $theme->setTitle("Songs and sayings");
        $this->addReference('theme.nine', $theme);
        $manager->persist($theme);

        $theme = new Theme();
        $theme->setTestament("old");
        $theme->setImage("");
        $theme->setTitle("God's messengers");
        $this->addReference('theme.ten', $theme);
        $manager->persist($theme);

        $theme = new Theme();
        $theme->setTestament("new");
        $theme->setImage("");
        $theme->setTitle("Jesus, God's Son");
        $this->addReference('theme.eleven', $theme);
        $manager->persist($theme);

        $theme = new Theme();
        $theme->setTestament("new");
        $theme->setImage("");
        $theme->setTitle("What Jesus said");
        $this->addReference('theme.twelve', $theme);
        $manager->persist($theme);

        $theme = new Theme();
        $theme->setTestament("new");
        $theme->setImage("");
        $theme->setTitle("God's great plan");
        $this->addReference('theme.thirteen', $theme);
        $manager->persist($theme);

        $theme = new Theme();
        $theme->setTestament("new");
        $theme->setImage("");
        $theme->setTitle("The first Christians");
        $this->addReference('theme.fourteen', $theme);
        $manager->persist($theme);

        $theme = new Theme();
        $theme->setTestament("new");
        $theme->setImage("");
        $theme->setTitle("Good news for everyone");
        $this->addReference('theme.fifteen', $theme);
        $manager->persist($theme);

        $theme = new Theme();
        $theme->setTestament("new");
        $theme->setImage("");
        $theme->setTitle("Belonging to God");
        $this->addReference('theme.sixteen', $theme);
        $manager->persist($theme);

        $theme = new Theme();
        $theme->setTestament("new");
        $theme->setImage("");
        $theme->setTitle("Living God's way");
        $this->addReference('theme.seventeen', $theme);
        $manager->persist($theme);

        $theme = new Theme();
        $theme->setTestament("new");
        $theme->setImage("");
        $theme->setTitle("Following Jesus");
        $this->addReference('theme.eightteen', $theme);
        $manager->persist($theme);

        $theme = new Theme();
        $theme->setTestament("new");
        $theme->setImage("");
        $theme->setTitle("With God, always!");
        $this->addReference('theme.nineteen', $theme);
        $manager->persist($theme);

        $theme = new Theme();
        $theme->setTestament("new");
        $theme->setImage("");
        $theme->setTitle("With God, always!");
        $this->addReference('theme.twenty', $theme);
        $manager->persist($theme);

        $manager->flush();
    }

    public function getOrder()
    {
        return 1;
    }
}