<?php
namespace E100\CoreBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

use Derham\CoreBundle\Entity\Note;
use Derham\CoreBundle\Entity\Theme;
use Derham\CoreBundle\Entity\Text;
use SplFileObject;

/**
 * Import association table for associate a Non-de Rham property to a de Rham agency based on zipcode.
 */
class ImportCommentCommand extends ContainerAwareCommand
{


    protected function configure()
    {
        $this
            ->setName('e100:import:Comment')
            ->setDescription('Import and update comment 1 to 100')
            ->addArgument('source', InputArgument::REQUIRED, 'EXCEL file')
            ->addArgument('language', InputArgument::REQUIRED, '[fr|en|?]')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        @ini_set('memory_limit', -1);

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
    }

    private function getDoctrine()
    {
        return $this->getContainer()->get('doctrine');
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
