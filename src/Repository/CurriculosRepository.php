<?php

namespace App\Repository;

use App\Entity\Curriculos;
use App\Entity\Usuarios;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Curriculos>
 */
class CurriculosRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Curriculos::class);
    }

    public function novo(array $data): Curriculos
    {
        $usuario = $this->getEntityManager()->getRepository(Usuarios::class)->findOneBy(['id' => $data['usuario']]);
        $curriculo = new Curriculos;
        $curriculo->setUsuarioId($usuario);
        $curriculo->setNomeCompleto($data['nome']);
        $curriculo->setTitulo($data['titulo']);
        $curriculo->setAreaAtuacao($data['area']);
        $curriculo->setEstado($data['uf']);
        $curriculo->setCidade($data['cidade']);
        $curriculo->setCountry($data['country']);
        $curriculo->setDataNascimento($data['nascimento']);
        $curriculo->setTelefone($data['telefone']);
        $curriculo->setGenero($data['genero']);
        $curriculo->setEstadoCivil($data['civil']);
        $curriculo->setCreatedAt(new \DateTimeImmutable("now", new \DateTimeZone("America/Sao_Paulo")));
        return $this->curriculos($curriculo);
    }

    public function curriculos(Curriculos $curriculo): Curriculos
    {
        $entityManager = $this->getEntityManager();
        $entityManager->persist($curriculo);
        $entityManager->flush();

        return $curriculo;
    }

    //    /**
    //     * @return Curriculos[] Returns an array of Curriculos objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('c')
    //            ->andWhere('c.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('c.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?Curriculos
    //    {
    //        return $this->createQueryBuilder('c')
    //            ->andWhere('c.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
