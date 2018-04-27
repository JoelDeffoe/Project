using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class PlatfromDestroyer : MonoBehaviour {

    public GameObject platfromeDestructionPoint;

	// Use this for initialization
	void Start () {
        platfromeDestructionPoint = GameObject.Find("PlatformeDestructuionPoint");
		
	}
	
	// Update is called once per frame
	void Update () {

        if (transform.position.x < platfromeDestructionPoint.transform.position.x)
        {
            // Destroy(gameObject);

            gameObject.SetActive(false);
        }
	}
}
