<?php
namespace AppBundle\Service;

use Doctrine\ORM\EntityManager;
use AppBundle\Entity\Horario;

class ColaboradorService
{
	protected $em;

    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

	public function desativar($id)
	{
    	$colaborador = $this->em->getRepository('AppBundle:User')->find($id);
    	$colaborador->setIsActive(0);
    	$this->em->flush();

    	return true;
	}

	public function salvar($post, $id=null, $objUser=null)
	{

		if(is_null($id)){

			foreach($post['User'] as $k => $v){
					//formata p/set
					$label = 'set'.ucfirst($k);
					$arrayInput = $objUser->$label($v);

				}
				
				$size = 0;
				foreach($post['Horario'] as $v){
					$size = sizeof($v);	
				}
				//var_dump($size); exit();
				for($i=1;$i<=$size;$i++){
					$horario = 'horario'.$i;
					$horario = new Horario();
					$horario->setDia($post['Horario']['dia'][$i]);
					$horario->setHorarioDe($post['Horario']['horarioDe'][$i]);
					$horario->setHorarioAte($post['Horario']['horarioAte'][$i]);
					$horario->setUser($objUser);
					$this->em->persist($horario);
				}	
				
				$this->em->persist($arrayInput);
				$this->em->flush();

		}else{
			$colaborador = $this->em->getRepository('AppBundle:User')->find($id);
			$horario = $this->em->getRepository('AppBundle:Horario')->findBy(array('user' => $id));
			
			foreach($post['User'] as $k => $v){
					//formata p/set
					$label = 'set'.ucfirst($k);
					$arrayInput = $colaborador->$label($v);
				}

			foreach($post['Horario'] as $k => $v){
				//formata p/set
				foreach($v as $key => $val){
					$label = 'set'.ucfirst($k);
					$arrayInputH = $horario[$key]->$label($val);
				}	
			}

			$this->em->persist($arrayInput);
			$this->em->persist($arrayInputH);
			$this->em->flush();
		}

		return true;
	}
}