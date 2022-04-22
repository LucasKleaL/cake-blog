<?php
declare(strict_types=1);

namespace App\Policy;

use App\Model\Entity\Article;
use Authorization\IdentityInterface;

class ArticlePolicy
{
    public function canAdd(IdentityInterface $user, Article $article)
    {
        return true;
    }

    public function canEdit(IdentityInterface $user, Article $article)
    {
        return $this->isAuthor($user, $article);
    }

    public function canDelete(IdentityInterface $user, Article $article)
    {
        return $this->isAuthor($user, $article);
    }

    public function canView(IdentityInterface $user, Article $article)
    {
        return true;
    }

    protected function isAuthor(IdentityInterface $user, Article $article)
    {
        return $article->user_id === $user->getIdentifier();
    }
}
