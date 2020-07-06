<?php
/**
 * @author      Alex Bilbie <hello@alexbilbie.com>
 * @copyright   Copyright (c) Alex Bilbie
 * @license     http://mit-license.org/
 *
 * @link        https://github.com/thephpleague/oauth2-server
 */

namespace App\Domain\Entities;

use League\OAuth2\Server\Entities\ClientEntityInterface;
use League\OAuth2\Server\Entities\Traits\ClientTrait;
use League\OAuth2\Server\Entities\Traits\EntityTrait;

class ClientEntity implements ClientEntityInterface
{
    use EntityTrait, ClientTrait;

    /**
     * @var string
     */
    protected $clientId;

    /**
     * @var string
     */
    protected $username;

    /**
     * @var string
     */
    protected $email;

    /**
     * @var string
     */
    protected $siteUrl;

    /**
     * @var string
     */
    protected $phone;

    /**
     * @var string
     */
    protected $pic;

    /**
     * @var string
     */
    protected $passwordHash;

    /**
     * @var string
     */
    protected $secretKey;

    /**
     * @var string
     */
    protected $authKey;

    /**
     * @var string
     */
    protected $passwordResetToken;

    /**
     * @var int
     */
    protected $status;

    /**
     * @var \Datetime
     */
    protected $createdAt;

    /**
     * @var \Datetime
     */
    protected $updatedAt;


    public function setName($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setRedirectUri($uri)
    {
        $this->redirectUri = $uri;
    }

    public function getRedirectUri()
    {
        return $this->redirectUri;
    }

    public function setConfidential()
    {
        $this->isConfidential = true;
    }

    public function getConfidential()
    {
        return $this->isConfidential;
    }


    /**
     * Get the value of clientId
     *
     * @return  string
     */ 
    public function getClientId()
    {
        return $this->clientId;
    }

    /**
     * Set the value of clientId
     *
     * @param  string  $clientId
     *
     * @return  self
     */ 
    public function setClientId(string $clientId)
    {
        $this->clientId = $clientId;

        return $this;
    }

    /**
     * Get the value of username
     *
     * @return  string
     */ 
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set the value of username
     *
     * @param  string  $username
     *
     * @return  self
     */ 
    public function setUsername(string $username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get the value of email
     *
     * @return  string
     */ 
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @param  string  $email
     *
     * @return  self
     */ 
    public function setEmail(string $email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of siteUrl
     *
     * @return  string
     */ 
    public function getSiteUrl()
    {
        return $this->siteUrl;
    }

    /**
     * Set the value of siteUrl
     *
     * @param  string  $siteUrl
     *
     * @return  self
     */ 
    public function setSiteUrl(string $siteUrl)
    {
        $this->siteUrl = $siteUrl;

        return $this;
    }

    /**
     * Get the value of phone
     *
     * @return  string
     */ 
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set the value of phone
     *
     * @param  string  $phone
     *
     * @return  self
     */ 
    public function setPhone(string $phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get the value of pic
     *
     * @return  string
     */ 
    public function getPic()
    {
        return $this->pic;
    }

    /**
     * Set the value of pic
     *
     * @param  string  $pic
     *
     * @return  self
     */ 
    public function setPic(string $pic)
    {
        $this->pic = $pic;

        return $this;
    }

    /**
     * Set the value of passwordHash
     *
     * @param  string  $passwordHash
     *
     * @return  self
     */ 
    public function setPasswordHash(string $passwordHash)
    {
        $this->passwordHash = $passwordHash;

        return $this;
    }

    /**
     * Get the value of secretKey
     *
     * @return  string
     */ 
    public function getSecretKey()
    {
        return $this->secretKey;
    }

    /**
     * Set the value of secretKey
     *
     * @param  string  $secretKey
     *
     * @return  self
     */ 
    public function setSecretKey(string $secretKey)
    {
        $this->secretKey = $secretKey;

        return $this;
    }

    /**
     * Get the value of authKey
     *
     * @return  string
     */ 
    public function getAuthKey()
    {
        return $this->authKey;
    }

    /**
     * Set the value of authKey
     *
     * @param  string  $authKey
     *
     * @return  self
     */ 
    public function setAuthKey(string $authKey)
    {
        $this->authKey = $authKey;

        return $this;
    }

    /**
     * Get the value of passwordResetToken
     *
     * @return  string
     */ 
    public function getPasswordResetToken()
    {
        return $this->passwordResetToken;
    }

    /**
     * Set the value of passwordResetToken
     *
     * @param  string  $passwordResetToken
     *
     * @return  self
     */ 
    public function setPasswordResetToken(string $passwordResetToken)
    {
        $this->passwordResetToken = $passwordResetToken;

        return $this;
    }

    /**
     * Get the value of status
     *
     * @return  int
     */ 
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set the value of status
     *
     * @param  int  $status
     *
     * @return  self
     */ 
    public function setStatus(int $status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get the value of createdAt
     *
     * @return  \Datetime
     */ 
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set the value of createdAt
     *
     * @param  \Datetime  $createdAt
     *
     * @return  self
     */ 
    public function setCreatedAt(\Datetime $createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get the value of updatedAt
     *
     * @return  \Datetime
     */ 
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * Set the value of updatedAt
     *
     * @param  \Datetime  $updatedAt
     *
     * @return  self
     */ 
    public function setUpdatedAt(\Datetime $updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }
}