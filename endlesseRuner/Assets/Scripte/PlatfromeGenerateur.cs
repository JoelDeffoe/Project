using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class PlatfromeGenerateur : MonoBehaviour {

    public GameObject thePlatform;
    public Transform generationPoint;
    public float distanceBeteen;

    private float platformWidth;

    public float distanceBeteenMin;
    public float distanceBeteenMax;

    //public GameObject[] thePlaforms;
    private int platformSelceter;
    private float[] platfromeWidths;

    public ObjectPouler[] theObjectPools;

    private float minHeight;
    public Transform maxHeighrPoint;
    private float maxHeight;
    public float maxHeightChange;
    private float hieghtChange;

    private CoinGenereter theCoinGenereter;
    public float randomCoinThreshold;

    public float randomSpikeThreshold;
    public ObjectPouler theSpikPool;

    // Use this for initialization
    void Start () {
        //platformWidth = thePlatform.GetComponent<BoxCollider2D>().size.x;
        platfromeWidths = new float[theObjectPools.Length];

        for (int i = 0; i < theObjectPools.Length; i++)
        {
            platfromeWidths[i] = theObjectPools[i].pooledObject.GetComponent<BoxCollider2D>().size.x;
        }
        minHeight = transform.position.y;
        maxHeight = maxHeighrPoint.position.y;

        theCoinGenereter = FindObjectOfType<CoinGenereter>();

	}
	
	// Update is called once per frame
	void Update () {
        if (transform.position.x < generationPoint.position.x)
        {
            distanceBeteen = Random.Range(distanceBeteenMin, distanceBeteenMax);

            platformSelceter = Random.Range(0, theObjectPools.Length);

            hieghtChange = transform.position.y + Random.Range(maxHeightChange, -maxHeightChange);
            if (hieghtChange > maxHeight)
            {
                hieghtChange = maxHeight;
            } else if(hieghtChange<minHeight)
            {
                hieghtChange = minHeight;
            }
            transform.position = new Vector3(transform.position.x + (platfromeWidths[platformSelceter]/2) + distanceBeteen, hieghtChange, transform.position.z);

           
            //Instantiate(/*thePlatform*/ theObjectPool[platformSelceter], transform.position, transform.rotation);

            GameObject newPlatfrom = theObjectPools[platformSelceter].GetPooledObject();

            newPlatfrom.transform.position = transform.position;
            newPlatfrom.transform.rotation = transform.rotation;
            newPlatfrom.SetActive(true);

            if (Random.Range(0f, 100f) < randomCoinThreshold)
            {
                theCoinGenereter.SpawnCoins(new Vector3(transform.position.x, transform.position.y + 1f, transform.position.z));
            }

            if (Random.Range(0f, 100f) < randomSpikeThreshold)
            {
                GameObject newSpike = theSpikPool.GetPooledObject();

                float spikeXPosition = Random.Range(-platfromeWidths[platformSelceter] / 2f + 1f, platfromeWidths[platformSelceter] / 2f- 1f);

                Vector3 spikePosition = new Vector3(spikeXPosition , 0.5f, 0f);
                            
                newSpike.transform.position = transform.position + spikePosition;
                newSpike.transform.rotation = transform.rotation;
                newSpike.SetActive(true);
            }
                transform.position = new Vector3(transform.position.x + (platfromeWidths[platformSelceter] / 2) + distanceBeteen, transform.position.y, transform.position.z);

        }
	}
}
