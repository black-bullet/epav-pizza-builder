<?php

namespace AppBundle\Repository;

use AppBundle\Entity\Ingredient;
use AppBundle\Entity\Preset;
use Doctrine\ORM\EntityRepository;

/**
 * IngredientRepository class
 *
 * @author Yevgeniy Zholkevskiy <blackbullet@i.ua>
 */
class IngredientRepository extends EntityRepository
{
    /**
     * Find ingredients by preset
     *
     * @param Preset $preset Preset
     *
     * @return Ingredient[]
     */
    public function findIngredientByPreset($preset)
    {
        $qb = $this->createQueryBuilder('i');

        return $qb->where($qb->expr()->eq('pr', ':preset'))
                  ->join('i.presetIngredients', 'pi')
                  ->join('pi.preset', 'pr')
                  ->setParameter('preset', $preset)
                  ->getQuery()
                  ->getResult();
    }
}
