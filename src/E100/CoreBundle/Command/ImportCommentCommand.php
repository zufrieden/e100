<?php
namespace E100\CoreBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

use E100\CoreBundle\Entity\Note;
use E100\CoreBundle\Entity\Theme;
use E100\CoreBundle\Entity\Text;

/**
 * Import association table for associate a Non-de Rham property to a de Rham agency based on zipcode.
 */
class ImportCommentCommand extends ContainerAwareCommand
{


    protected function configure()
    {
        $this
            ->setName('e100:import:comment')
            ->setDescription('Import and update comment 1 to 100')
            ->addArgument('source', InputArgument::REQUIRED, 'EXCEL file (.xlsx)')
            ->addOption('language', null, InputOption::VALUE_REQUIRED, '[fr|en|?] (don\t used actually)', 'en')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        @ini_set('memory_limit', -1);

        $inputFileName = $input->getArgument('source');
        $language = $input->getOption('language');
        $em = $this->getDoctrine()->getEntityManager();

        /*
         Excel document structure
            1 Text unique ID (1 to 100) text->setId()
            2 Theme ID (1 to 20) text->setThemeId()
            3 skip it --- Texte no (column to skip, internal)
            4 skip it --- Text title in english
            5 Bible reference (Genèse 2,15-22) text->setBibleReference()
            6 skip it --- Titre de la section
            7 skip it --- Intro not use for now
            8 skip it --- Image not use for now
            9 skip it --- Auteur not use for now
           10 skip it --- Auteur infos not use for now
           11 Titre text->setTitle()
           12 Teaser question text->setTeaserQuestion()
           13 Texte biblique text->setBibleText() do the Mathieu function
           14 Commentaire text->setComment()
           15 Priere text->setActionText()
           16 Link text->setLink()
        */
        $phpExcel = \PHPExcel_IOFactory::load($inputFileName);
        $data = $phpExcel->getActiveSheet()->toArray(null,true,true,true);


        $texts = $this->getTextsIndexedByNumber();

        // remove first line
        unset($data[1]);

        foreach ($data as $i => $line) {
            $textNumber = (int) $line['A'];
            $bibleText = $this->formatVerset($line['M'], $line['E']);

            if (isset($texts[$textNumber])) {
                $text = $texts[$textNumber];
            } else {
                // create a new Text if not exists
                $text = new Text();
            }

            $text->setTheme($this->getThemeById($line['B']));
            $text->setTextNumber($textNumber);
            $text->setBibleRef($line['E']);
            $text->setTitle($line['K'] ?: '[empty]');
            $text->setTeaserQuestion($bibleText);
            $text->setBibleText($bibleText ?: '[empty]');
            $text->setComment($line['N'] ?: '[empty]');
            $text->setActionText($line['O'] ?: '[empty]');
            $text->setLink($line['P']);

            $em->persist($text);
        }

        $em->flush();

    }

    private function getDoctrine()
    {
        return $this->getContainer()->get('doctrine');
    }

    private function getTextsIndexedByNumber()
    {
        $results = $this->getDoctrine()->getRepository('E100CoreBundle:Text')->findAll();
        $texts = array();

        foreach($results as $text) {
            $texts[$text->getTextNumber()] = $text;
        }

        return $texts;
    }

    private function getThemeById($numberId)
    {
        $theme = $this->getDoctrine()->getRepository('E100CoreBundle:Theme')->findOneById((int)$numberId);

        return $theme;
    }

    private function formatVerset($text, $versetRef = null)
    {
        // @TODO: add <sup></sup> around verset number
        return $text;
    }

    // @todo -> put verset number in <sup></sup> base on bibleReference field
    // private function supContent($post){
    //   $content = $post->post_content;
    //   $pattern = '#\s?([0-9]+)\s?#';
    //   if(preg_match('#<sup>#', $content)){
    //     return false;
    //   }
    //   preg_match_all($pattern, $content, $nbsResult);

    //   $verset = get_post_meta($post->ID, 'ref', true);
    //   //Find versets
    //   preg_match_all('#[0-9]+\.([0-9]+)-?([0-9]+)?#',$verset, $versetsResult);
    //   if(count($versetsResult[1]) > 1){
    //     $content = preg_replace($pattern, '<sup>$1</sup>', $content);
    //     return $content;
    //   }else{
    //     //Ajoute le premier numero de verset si oublié
    //     if($versetsResult[1][0] != $nbsResult[0][0]){
    //       $content = $versetsResult[1][0] . ' ' .$content;
    //       preg_match_all($pattern, $content, $nbsResult);
    //     }
    //     $lastReplace = $versetsResult[1][0] - 1;

    //     $replaceCount = 0;
    //     foreach($nbsResult[0] as $index => $value){
    //       if($value == $lastReplace + 1){
    //         // $pattern = '#(<sup[.]*>){'.$replaceCount.'}.*('.$value.')#';
    //         $pattern = '#('.$value.')#';
    //         if($content = preg_replace($pattern, '<sup>$1</sup>', $content)){
    //          // print $content;
    //           $replaceCount++;
    //           $lastReplace = $value;
    //         }
    //       }
    //     }
    //   }
    //   return $content;
    // }


}
