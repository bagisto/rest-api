<?php

namespace Webkul\RestApi\Docs\Admin\Models\Setting;

/**
 * @OA\Schema(
 *     title="InventorySource",
 *     description="InventorySource model",
 * )
 */
class InventorySource
{
    /**
     * @OA\Property(
     *     title="ID",
     *     description="ID",
     *     format="int64",
     *     example=1
     * )
     *
     * @var integer
     */
    private $id;
    
    /**
     * @OA\Property(
     *     title="Code",
     *     description="Inventory source's code",
     *     example="default"
     * )
     *
     * @var string
     */
    private $code;
    
    /**
     * @OA\Property(
     *     title="Name",
     *     description="Inventory source's name",
     *     example="Default"
     * )
     *
     * @var string
     */
    private $name;
    
    /**
     * @OA\Property(
     *     title="Description",
     *     description="Inventory source's description",
     *     example=null
     * )
     *
     * @var string
     */
    private $description;
    
    /**
     * @OA\Property(
     *     title="Contact Name",
     *     description="Inventory source's contact name",
     *     example="Detroit Warehouse"
     * )
     *
     * @var string
     */
    private $contact_name;
    
    /**
     * @OA\Property(
     *     title="Contact Email",
     *     description="Inventory source's contact email",
     *     example="warehouse@example.com"
     * )
     *
     * @var string
     */
    private $contact_email;
    
    /**
     * @OA\Property(
     *     title="Contact Number",
     *     description="Inventory source's contact number",
     *     example="1234567899"
     * )
     *
     * @var string
     */
    private $contact_number;
    
    /**
     * @OA\Property(
     *     title="Contact Fax",
     *     description="Inventory source's contact fax",
     *     example=null
     * )
     *
     * @var string
     */
    private $contact_fax;
    
    /**
     * @OA\Property(
     *     title="Country",
     *     description="Inventory source's country code",
     *     example="US"
     * )
     *
     * @var string
     */
    private $country;
    
    /**
     * @OA\Property(
     *     title="State",
     *     description="Inventory source's state code",
     *     example="MI"
     * )
     *
     * @var string
     */
    private $state;
    
    /**
     * @OA\Property(
     *     title="City",
     *     description="Inventory source's city",
     *     example="Detroit"
     * )
     *
     * @var string
     */
    private $city;
    
    /**
     * @OA\Property(
     *     title="Street",
     *     description="Inventory source's street",
     *     example="12th Street"
     * )
     *
     * @var string
     */
    private $street;
    
    /**
     * @OA\Property(
     *     title="Postcode",
     *     description="Inventory source's postcode",
     *     example="48127"
     * )
     *
     * @var string
     */
    private $postcode;
    
    /**
     * @OA\Property(
     *     title="Priority",
     *     description="Inventory source's priority",
     *     example=0
     * )
     *
     * @var integer
     */
    private $priority;
    
    /**
     * @OA\Property(
     *     title="Latitude",
     *     description="Inventory source's latitude",
     *     example=null
     * )
     *
     * @var float
     */
    private $latitude;
    
    /**
     * @OA\Property(
     *     title="Longitude",
     *     description="Inventory source's longitude",
     *     example=null
     * )
     *
     * @var float
     */
    private $longitude;
    
    /**
     * @OA\Property(
     *     title="Status",
     *     description="Inventory source's status",
     *     example=1,
     *     enum={0, 1}
     * )
     *
     * @var integer
     */
    private $status;
    
    /**
     * @OA\Property(
     *     title="Created at",
     *     description="Created at",
     *     example="2020-01-27 17:50:45",
     *     format="datetime",
     *     type="string"
     * )
     *
     * @var \DateTime
     */
    private $created_at;

    /**
     * @OA\Property(
     *     title="Updated at",
     *     description="Updated at",
     *     example="2020-01-27 17:50:45",
     *     format="datetime",
     *     type="string"
     * )
     *
     * @var \DateTime
     */
    private $updated_at;
}